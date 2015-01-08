<?php
	function generateWebmPreview($webm, $jpg, $width){
		$shall = "ffmpeg -i ".escapeshellarg($webm)." -r 1 -vf scale=".$width.":-1 -f image2 ".escapeshellarg($jpg)." 2>&1";
		$output = shell_exec($shall);
 		echo "<pre>".$output."</pre>";
	}
?>