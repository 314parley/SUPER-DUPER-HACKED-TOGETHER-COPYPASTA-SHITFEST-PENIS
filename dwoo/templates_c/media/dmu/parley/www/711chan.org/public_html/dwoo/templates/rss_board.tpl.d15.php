<?php
ob_start(); /* template body */ ?><?php echo '<?xml'; ?> version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
<title><?php echo KU_NAME;?> - <?php echo $this->scope["boardname"];?></title>
<link><?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?></link>
<description>Live RSS feed for <?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?></description>
<language><?php echo KU_LOCALE;?></language>';
<?php 
$_fh0_data = (isset($this->scope["posts"]) ? $this->scope["posts"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
	<item>
	<title><?php echo $this->scope["item"]["id"];?></title>
	<link>
	<?php if ((isset($this->scope["item"]["parentid"]) ? $this->scope["item"]["parentid"]:null) != 0) {
?>
		<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?>/res/<?php echo $this->scope["item"]["parentid"];?>.html#<?php echo $this->scope["item"]["id"];?></link>
	<?php 
}
else {
?>
		<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?>/res/<?php echo $this->scope["item"]["id"];?>.html</link>
	<?php 
}?>

	<description><![CDATA[
	<?php if ((isset($this->scope["item"]["file"]) ? $this->scope["item"]["file"]:null) != '') {
?>
		<?php if ((isset($this->scope["item"]["file_type"]) ? $this->scope["item"]["file_type"]:null) == 'jpg' || (isset($this->scope["item"]["file_type"]) ? $this->scope["item"]["file_type"]:null) == 'png' || (isset($this->scope["item"]["file_type"]) ? $this->scope["item"]["file_type"]:null) == 'gif') {
?>
			<a href="<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?>/src/<?php echo $this->scope["item"]["file"];?>.<?php echo $this->scope["item"]["file_type"];?>"><img src="<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?>/thumb/<?php echo $this->scope["item"]["file"];?>s.<?php echo $this->scope["item"]["file_type"];?>" /></a><br /><br />
		<?php 
}
else {
?>
			[<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["boardname"];?>/src/<?php echo $this->scope["item"]["file"];?>.<?php echo $this->scope["item"]["file_type"];?>] <br /><br />
		<?php 
}?>

	<?php 
}?>

	<?php if (trim((isset($this->scope["item"]["message"]) ? $this->scope["item"]["message"]:null)) != '') {
?>
		<?php echo stripslashes((isset($this->scope["item"]["message"]) ? $this->scope["item"]["message"]:null));?><br />
	<?php 
}?>

	]]></description>
	</item>
<?php 
/* -- foreach end output */
	}
}?>

</channel>
</rss>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>