<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/front.css">
	<title>{$title}</title>
</head>	

<body>
	<!--<div class="logo"></div>-->
	<h1 style="text-align:center; font-size:42px;color:#8d0000;">{$title}</h1>
	<h3 style="text-align:center;margin: -25px auto auto auto">{$slogan}</h3>

	<div class="menu">
		<ul>
			<li><a href="?page=index" {if $page eq 'index'}class="active"{/if}>Home</a></li>
			<li><a href="?page=news" {if $page eq 'news'}class="active"{/if}>News</a></li>
			<li><a href="?page=faq" {if $page eq 'faq'}class="active"{/if}>FAQ</a></li>
			<li><a href="?page=rules" {if $page eq 'rules'}class="active"{/if}>Rules</a></li>
			<li><a href="?page=banlist" {if $page eq 'banlist'}class="active"{/if}>Bans</a></li>
			<li><a href="kusaba.php">Frames</a></li>
		</ul>
	</div>