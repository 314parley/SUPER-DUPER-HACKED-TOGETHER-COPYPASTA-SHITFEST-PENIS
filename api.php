<?php
/*
 * simple JSON API. so terrible.
 */


// I recommend you know what the fuck you're doing.
require ("config.php");
require ("inc/functions.php");
header ("Content-type: application/json");

if(isset($_GET["news"])){
	$news = json_encode($tc_db->GetAll("SELECT * FROM front WHERE page = 0 ORDER BY timestamp DESC"));
	echo($news);
}else if(isset($_GET["faq"])){
	$faq = json_encode($tc_db->GetAll("SELECT * FROM front WHERE page = 1 ORDER BY `order` ASC"));
	echo($faq);
}else if(isset($_GET["rules"])){
	$rules = json_encode($tc_db->GetAll("SELECT * FROM front WHERE page = 2 ORDER BY `order` ASC"));
	echo($rules);	
}else if(isset($_GET["boards"])){
	#echo("boards JSON API being written.");
	$boards = json_encode($tc_db->GetAll("SELECT `name`,`desc` FROM boards ORDER BY `name` ASC"));
	echo($boards);
}else if(isset($_GET["board"])){
$board = $tc_db->GetAll("SELECT `name` FROM boards ORDER BY `name` ASC"));
if(in_array($_GET["board", $board)){
	echo("test");
}else{
	$error = json_encode(array("Error"=> "You must request a board."))
}
}else{
	$error = json_encode(array("Error" => "You requested an API endpoint that does not exist."));
	echo($error);
}
?>