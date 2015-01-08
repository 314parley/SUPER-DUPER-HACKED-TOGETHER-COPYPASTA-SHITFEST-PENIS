<?php
require_once('ini.php'); 

/*hashes two images resources $res1 and $res2, and runs a number of checks on the hashes
to find if the images match within the threshold. A post will be rejected if:

	- the images match (including 90 degree rotations, mirrors and flips)
	- the image being uploaded is blank (within the threshold)
	- the images are negatives of one another
	
othewise posting will continue. This will also collect a group of hashes (one for each transform
check) and add them to a hashfile to allow checking against a cache of prior images without actually
generating new image resources to do so.

	$res1:	a resource
	$res2:	a resource
	$filename:	filename (or some generated string) to be used as an index in the hash array
	$board: the current board being posted to
	$hashfile: location of a hashfile 
	$settings: an array of settings
		- allowboards: comma-separated string of boardnames to allow comparisons on
		- hashfail: threshold for the hash comparsison 
		- blankfail: threshold at which to consider an image 'blank'. This works by summing up the value of the
			hash so a completely blank image would have a sum of 0.
		- hashcache: number of hashes to store in the hashes.ini file
		- resourcesize: dimension (width and height) of the thumbnails to create and hash from each image. 
		A larger value will result in more accurate matching but obviously also cause the script to run slower. 
		
	$returnvalues: will not add the new file to a hashfile or stop posting, but just return an array of data.

	- generated hashes for each resource (minus transforms)
		$array['hash1']
		$array['hash2']
	
	- hamming distance comparison 
		$array['distance']
		
*/
function ImageTest($res1, $res2, $filename, $board, $hashfile, $settings = Array('resourcesize'=>8,	'allowboards' 	=> 'b,s',	'hashfail' 	=> 6,	'blankfail'	=> 0,	'hashcache'	=> 4), $returnvalues = false){
	global $tc_db;
	
	$allowboards = explode(',',$settings['allowboards']);
	
	if (in_array($board, $allowboards)){
	
		/* this is the dimension (w*h) of the resources created and hashed from the images.
		If you change this you should empty out all of your hashes.ini files otherwise you will get false positives,
		as all the hashes must be of the same size. */
		
		$resourcesize = $settings['resourcesize']; 
							
		$hashsize = pow($resourcesize, 2);
		$HASHFAIL = false;
		$BLANKFAIL = false;
							
		$res1cached = imagecreatetruecolor($resourcesize, $resourcesize);
		fastimagecopyresampled($res1cached, $res1, 0, 0, 0, 0, $resourcesize,$resourcesize, imagesx($res1), imagesy($res1),1);
								
		$res2cached = imagecreatetruecolor($resourcesize, $resourcesize);
		fastimagecopyresampled($res2cached, $res2, 0, 0, 0, 0, $resourcesize, $resourcesize, imagesx($res2), imagesy($res2),1);
											
		$res1cached = Desaturate($res1cached);
		$res2cached = Desaturate($res2cached);					
													
		// get binary hashes for the images
		$p1 = BinaryHash($res1cached,0);
		$p2 = BinaryHash($res2cached,0);
									
		// only compare if the hash lengths are the same...
		if(strlen($p1) == strlen($p2)){
											
			 /* check if one hash is inverse of the other (negative)*/
			 if($p1 == InvertBinary($p2)){
				$HASHFAIL = true;
			} 

			/* blank image check*/
			if(array_sum(str_split($p1)) <= $settings['blankfail']){
					$BLANKFAIL = true;
			}
													
			/*hamming comparison*/
			$hamming = HammingDistanceBinary($p1, $p2);
			if($hamming <= $settings['hashfail']){
				$HASHFAIL = true;
			}
														
			/* now check the stored hashes*/
			$hashes = parse_ini_file($hashfile,	true);
							
			foreach ($hashes as $hkey => $hval){
				foreach($hval as $key => $val){
					$hash = $val;
					
					// skip this if they've already failed a check
					if(($HASHFAIL == false) && ($BLANKFAIL == false) && (strlen($hash) == $hashsize)){
						$hamming = HammingDistanceBinary($hash, $p1);
											
						if($hamming <= $settings['hashfail']){
							$HASHFAIL = true;
							break 2; 
						}
					}
				}
			}
				
				/*if they only wanted the values, return them here*/
				
			if($returnvalues !== false){
			
				// destroy the resources
				imagedestroy($res1cached);
				imagedestroy($res2cached);
			
				return array(
					'hash1' => $p1,
					'hash2' => $p2,
					'distance' => $hamming
				);
				
			}
			else{
								
				/* check for a flip, reverse, and flip&reverse match at	0, 90, 180 and 270 degrees against the user image. 
				add each rotational hash to the ini file as an index in a new array*/
														
				$inihash = array();
								
				for($m=0; $m<3; $m++){
					for($t=0; $t<=360; $t+=90){
						$hash = BinaryHash($res1cached, $t, $m);
						array_push($inihash, $hash);
										
						// skip this if they've already failed a check
						// also verify the hash length
						
						if(($HASHFAIL == false) && ($BLANKFAIL == false) && (strlen($hash) == $hashsize)){
							$hamming = HammingDistanceBinary($hash, $p2);
							if($hamming <= $settings['hashfail']){
								$HASHFAIL = true;
								$err = 'rotation:'.$t;
				
							}
						}
					}
				}
												
				addHashGroup($hashfile, $inihash, $filename, $settings['hashcache'], $hashsize);
					
				// destroy the resources
				imagedestroy($res1cached);
				imagedestroy($res2cached);
					
					// now fail 
				if($HASHFAIL == true){
					exitWithErrorPage(_gettext('Duplicate file entry detected.'));
				}
								
				elseif($BLANKFAIL == true){
					exitWithErrorPage(_gettext('Blank file entry detected.'));
				}
			}
		}
	}
}

/* binary perceptual hasher -- http://www.hackerfactor.com/blog/index.php?/archives/432-Looks-Like-It.html  

This takes an image resource $res and converts it to a binary string, with each bit representing whether a pixel
was brighter or darker than the average for that image. When used on two images which have been transformed to
a common size (the number of pixels and, therefore, length of the hash string have to match for the hamming 
distance check to work properly) the similarity of these images can be found by comparing the hashes.

	$rot:	an index of rotation (in 90 degree units because I couldn't figure out how to get it to work with
			arbitrary angles.) A basic image rotation script is used to hash the pixels as if it were rotated.
			The same image which has been rotated will match that hash.
			
	$mir:	another transform check, for x and y mirrors
*/

 
function BinaryHash($res, $rot = 0, $mir=0){

	$w = imagesx($res);
	$h = imagesy($res);
	$index=0;
	$pixels = array();
	
	// flatten the image into a simple array of pixel values
	
	if(in_array($rot, Array(0,90,180,270))){
				
		for($i = 0;$i < $w ; $i++) {
			for($j = 0;$j < $h ; $j++) {
			
				// transform for rotation
				switch($rot){
					case 90:	$rx=(($h-1)-$j);	$ry=$i;			break;
					case 180:	$rx=($w-$i)-1;		$ry=($h-1)-$j;	break;
					case 270:	$rx=$j;				$ry=($h-$i)-1;	break;
					default:	$rx=$i;				$ry=$j;
				}
				
				// transform for mirror/flip
				switch($mir){
					case 1: $rx = (($w-$rx)-1); break;
					case 2: $ry = ($h-$ry); 	break;
					case 3: $rx = (($w-$rx)-1);
							$ry = ($h-$ry); 	break;
					default: 					break;
				}
				
				$pixels[$index] = imagecolorat($res,$rx,$ry);
				$index++;
			}
		}
	
	
	// find the average value in the array
	$avg = floor(array_sum($pixels) / count(array_filter($pixels)));
	
	// create a hash (1 for pixels above the mean, 0 for average or below)
	$index = 0;
	
	foreach($pixels as $px){
		if($px > $avg){
			$hash[$index] = 1;
		}
		else{
			$hash[$index] = 0;
		}
		$index += 1;
	}
		// return the array as a string 
		return implode(null,$hash);
	}
	
	else return false;
}


/*
takes a group of hashes associated with an image and adds them to one of the hashfiles.
if the hashfile doesn't exist, it's created.
*/
function addHashGroup($hashfile, $hasharray, $key, $cachelimit = 0, $hashlimit = 0){

		// add the new group to the ini file as an array with an index 'hash'+timestamp
		$ini = parse_ini_file($hashfile,true);
		$hasharray = array_values(array_filter($hasharray)); // remove blank values i don't know why they exist but they do...
		$arr = array_merge($ini, array($key => $hasharray));
		
		// trim to cache limit
		if(count($arr) > $cachelimit){
			$rem = count($arr) - $cachelimit;
			$arr = array_slice($arr,$rem);
		}
		
		write_php_ini($arr, $hashfile);
}

 
 /*	http://stackoverflow.com/questions/2667147/how-to-calculate-the-hamming-distance-of-two-binary-sequences-in-php
 finds the Hamming distance between two binary sequences, a lower value means the sequences are more identical. 
 For our purposes distance < 10 should mean the two hashes match or almost match.*/

function HammingDistanceBinary($b1, $b2) {
    $b1 = ltrim($b1, '0');
    $b2 = ltrim($b2, '0');
    $l1 = strlen($b1);
    $l2 = strlen($b2);
    $n = min($l1, $l2);
    $d = max($l1, $l2) - $n;
    for ($i=0; $i<$n; ++$i) {
        if ($b1[$l1-$i] != $b2[$l2-$i]) {
            ++$d;
        }
    }
    return $d;
}

//inverts a binary sequence. Used to match negative filters

function InvertBinary($seq){
	$s = str_split($seq);
	
	foreach($s as &$bit){
		$bit = ($bit == 0)? 1: 0;
	}
	
	return implode($s);
}

/* returns an image resource as grayscale*/

 function yiq($r,$g,$b) {
	return (($r*0.299)+($g*0.587)+($b*0.114));
} 

function Desaturate($res){
 
	$resource = array();
	$i = 0;

	$width = imagesx($res);
	$height = imagesy($res);
	$canvas= imagecreate($width, $height); 
 
	for ($c=0;$c<256;$c++) {
		$palette[$c] = imagecolorallocate($canvas,$c,$c,$c);
	}

 	for($y=0; $y<=$height; $y++){
		for($x=0; $x<=$width; $x++){
			$rgb = imagecolorat($res,$x,$y);
			
			$r = ($rgb >> 16) & 0xFF;
			$g = ($rgb >> 8) & 0xFF;
			$b = $rgb & 0xFF;
			
			$gs = yiq($r,$g,$b);
			imagesetpixel($canvas,$x,$y,$palette[$gs]);
			$i+=1;
		}
	}

	return $canvas;		
}

/* returns the resource of either the last posted image or thumbnail, or false */
function GetLatestImage($boardid, $isthumb = false){
	
	$latest = false;
	
	require_once('config.php');
	global $tc_db;
	
	$result = $tc_db->GetAll("SELECT HIGH_PRIORITY * FROM `".KU_DBPREFIX."posts` WHERE (`file_type` = 'jpg' OR `file_type` = 'gif' OR `file_type` = 'png') AND `boardid` = " . $boardid . " AND `is_deleted` = 0 ORDER BY `timestamp` DESC LIMIT 1");

	// skip if there are no images in the db yet....
	
	if(count($result) > 0){
		$file =  $result[0]['file'];
		$ftype = $result[0]['file_type'];
		$board = $tc_db->GetOne("SELECT `name` FROM `".KU_DBPREFIX."boards` WHERE `id`=".$boardid);
			
		if($isthumb == true){
			$res = KU_ROOTDIR . $board . '/thumb/'. $file . 's.'. $ftype;
		}
		else{
			$res = KU_ROOTDIR . $board . '/src/'. $file . '.'. $ftype;
		}
			
		if(@file_exists($res)){
			$latest = 	imagecreatefromstring(file_get_contents($res));
		}
	}
	
	return $latest;
}

/* improves contrast for an image  (not really used )

function contrast_stretch( $img, $write = false) {
    $x = imagesx($img);
    $y = imagesy($img);

    $min=255.0;
    $max=0.0;

    for($i=0; $i<$y; $i++) {
		for($j=0; $j<$x; $j++) {
			$pos = imagecolorat($img, $j, $i);
			$f = imagecolorsforindex($img, $pos);
			$gst = $f["red"]*0.15 + $f["green"]*0.5 + $f["blue"]*0.35;
			if($gst>$max) $max=$gst;
			if($gst<$min) $min=$gst;
		}
    }

    $distance = $max-$min;

    for($i=0; $i<$y; $i++) {
		for($j=0; $j<$x; $j++) {
			$pos = imagecolorat($img, $j, $i);
			$f = imagecolorsforindex($img, $pos);

			$red = 255*($f["red"]-$min)/($distance+1);
			$green = 255*($f["green"]-$min)/($distance+1);
			$blue = 255*($f["blue"]-$min)/($distance+1);

			if($red<0) $red = 0.0;
			elseif($red>255) $red=255.0;

			if($green<0) $green = 0.0;
			elseif($green>255) $green=255.0;

			if($blue<0) $blue = 0.0;
			elseif($blue>255) $blue=255.0;

			$color = imagecolorresolve($img, $red, $green, $blue);
			imagesetpixel($img, $j, $i, $color);
			
		}
    }
}*/

?>