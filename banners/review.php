<form action="review.php" method="post">
<?php
if ($_GET['show_source'] == "true") {
    show_source(__FILE__);
    die();
}
$imgdir = 'upload/'; 
$allowed_types = array('png','jpg','jpeg','gif'); 
$dimg = opendir($imgdir);
while($imgfile = readdir($dimg))
{
  if( in_array(strtolower(substr($imgfile,-3)),$allowed_types) || in_array(strtolower(substr($imgfile,-4)),$allowed_types) )
/*If the file is an image add it to the array*/
  {
  	$a_img[] = $imgfile;
  	
  }
  #var_dump($imgfile);
}
echo "<ul style=\"list-style: none;\">";

 $totimg = count($a_img);
 for($x=0; $x < $totimg; $x++)
{
echo "<li><input type=\"checkbox\" name=\"check_list[]\" value=\"$a_img[$x]\"><img src='" . $imgdir . $a_img[$x] . "' /></input></li>";
}
echo "</ul>";
?>
<input type="submit" />
</form>
<?php
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
    	#var_dump($check);
            echo $check."<br />";
            //file should be copied one directory back, and then deleted 
            if (copy($check,"../")) {
            	unlink($check);
            //if it fails for whatever reason...
            }else{
	            echo "File already exists?";
            }
    }
}
?>