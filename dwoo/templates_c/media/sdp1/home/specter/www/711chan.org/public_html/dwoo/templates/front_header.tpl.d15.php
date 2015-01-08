<?php
ob_start(); /* template body */ ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/front.css">
	<title><?php echo $this->scope["title"];?></title>
</head>	

<body>
	<!--<div class="logo"></div>-->
	<h1 style="text-align:center; font-size:42px;color:#8d0000;"><?php echo $this->scope["title"];?></h1>
	<h3 style="text-align:center;margin: -25px auto auto auto"><?php echo $this->scope["slogan"];?></h3>

	<div class="menu">
		<ul>
			<li><a href="?page=index" <?php if ((isset($this->scope["page"]) ? $this->scope["page"] : null) == 'index') {
?>class="active"<?php 
}?>>Home</a></li>
			<li><a href="?page=news" <?php if ((isset($this->scope["page"]) ? $this->scope["page"] : null) == 'news') {
?>class="active"<?php 
}?>>News</a></li>
			<li><a href="?page=faq" <?php if ((isset($this->scope["page"]) ? $this->scope["page"] : null) == 'faq') {
?>class="active"<?php 
}?>>FAQ</a></li>
			<li><a href="?page=rules" <?php if ((isset($this->scope["page"]) ? $this->scope["page"] : null) == 'rules') {
?>class="active"<?php 
}?>>Rules</a></li>
			<li><a href="?page=banlist" <?php if ((isset($this->scope["page"]) ? $this->scope["page"] : null) == 'banlist') {
?>class="active"<?php 
}?>>Bans</a></li>
			<li><a href="kusaba.php">Frames</a></li>
		</ul>
	</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>