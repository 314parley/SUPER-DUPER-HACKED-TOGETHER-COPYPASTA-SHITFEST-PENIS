<?php
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
if (function_exists('Dwoo_Plugin_date_format')===false)
	$this->getLoader()->loadPlugin('date_format');
ob_start(); /* template body */ ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>YOU ARE BANNED<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>!</title>
<link rel="stylesheet" type="text/css" href="<?php echo KU_BOARDSPATH;?>/css/site_futaba.css" title="Futaba">
<link rel="shortcut icon" href="<?php echo KU_WEBPATH;?>/favicon.ico">
</head>
<body>
<h1><?php echo KU_NAME;?></h1>
<h3><?php echo KU_SLOGAN;?></h3>
<div style="margin: 3em;">
	<h2>&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>YOU ARE BANNED<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>! ;-;</h2>
	<img src="<?php echo KU_BOARDSPATH;?>/youarebanned.jpg" style="float: right;" alt=":'(">
	<?php 
$_fh0_data = (isset($this->scope["bans"]) ? $this->scope["bans"] : null);
$this->globals["foreach"]['bans'] = array
(
	"index"		=> 0,
	"iteration"		=> 1,
	"first"		=> null,
	"last"		=> null,
	"total"		=> $this->isArray($_fh0_data) ? count($_fh0_data) : 0,
);
$_fh0_glob =& $this->globals["foreach"]['bans'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['ban'])
	{
		$_fh0_glob["first"] = (string) ($_fh0_glob["index"] === 0);
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */
?>
		<?php if (! (isset($this->globals["foreach"]["bans"]["first"]) ? $this->globals["foreach"]["bans"]["first"]:null)) {
?>
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Additionally<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>,
		<?php 
}?>

		<?php if ((isset($this->scope["ban"]["expired"]) ? $this->scope["ban"]["expired"]:null) == 1) {
?>
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>You were banned from posting on<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		<?php 
}
else {
?>
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>You have been banned from posting on<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		<?php 
}?> 
		<strong><?php if ((isset($this->scope["ban"]["globalban"]) ? $this->scope["ban"]["globalban"]:null) == 1) {

 if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>All boards<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);

}
else {
?>/<?php echo implode('/</strong>, <strong>/', explode('|', (isset($this->scope["ban"]["boards"]) ? $this->scope["ban"]["boards"]:null)));?>/<?php 
}?></strong> <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>for the following reason<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>:<br /><br />
		<strong><?php echo $this->scope["ban"]["reason"];?></strong><br /><br />
		<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Your ban was placed on<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <strong><?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["ban"]["at"]) ? $this->scope["ban"]["at"]:null), "%B %e, %Y, %I:%M %P %Z", null);?></strong>, <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>and<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		<?php if ((isset($this->scope["ban"]["expired"]) ? $this->scope["ban"]["expired"]:null) == 1) {
?>
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>expired on<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <strong><?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["ban"]["until"]) ? $this->scope["ban"]["until"]:null), "%B %e, %Y, %I:%M %P", null);?></strong><br  />
			<strong><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>This ban has already expired, this message is for your information only and will not be displayed again<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></strong>
		<?php 
}
else {
?>
			<?php if ((isset($this->scope["ban"]["until"]) ? $this->scope["ban"]["until"]:null) > 0) {

 if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>will expire on<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <strong><?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["ban"]["until"]) ? $this->scope["ban"]["until"]:null), "%B %e, %Y, %I:%M %P", null);?></strong><?php 
}
else {

 if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>will not expire<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></strong><?php 
}?>

		<?php 
}?>

		<br /><br />
		<?php if ((defined("KU_APPEAL") ? KU_APPEAL : null) != '' && (isset($this->scope["ban"]["expired"]) ? $this->scope["ban"]["expired"]:null) == 0) {
?>
			<?php if ((isset($this->scope["ban"]["appealat"]) ? $this->scope["ban"]["appealat"]:null) == 0) {
?>
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>You may <strong>not</strong> appeal this ban.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			<?php 
}
elseif ((isset($this->scope["ban"]["appealat"]) ? $this->scope["ban"]["appealat"]:null) == - 1) {
?>
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Your appeal is currently pending review.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>For reference, your appeal message is<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>:<br />
				<strong><?php echo $this->scope["ban"]["appeal"];?></strong>
			<?php 
}
elseif ((isset($this->scope["ban"]["appealat"]) ? $this->scope["ban"]["appealat"]:null) == - 2) {
?>
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Your appeal was reviewed and denied. You may <strong>not</strong> appeal this ban again.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>For reference, your appeal message was<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>:<br />
				<strong><?php echo $this->scope["ban"]["appeal"];?></strong>
			<?php 
}
else {
?>
				<?php if ((isset($this->scope["ban"]["appealat"]) ? $this->scope["ban"]["appealat"]:null) < (isset($this->globals["now"]) ? $this->globals["now"]:null)) {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>You may now appeal this ban.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					<br /><br />
					<form action="<?php echo KU_BOARDSPATH;?>/banned.php" method="post">
						<input type="hidden" name="banid" value="<?php echo $this->scope["ban"]["id"];?>" />
						<label for="appealmessage"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Appeal Message<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>:</label>
						<br />
						<textarea name="appealmessage" rows="10" cols="50"></textarea>
						<br /><input type="submit" value="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Send Appeal<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
					</form>
				<?php 
}
else {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>You may appeal this ban in<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <strong><?php echo $this->scope["ban"]["appealin"];?></strong>.
				<?php 
}?>

			<?php 
}?>

			<br />
		<?php 
}?>

		<?php if ((isset($this->globals["foreach"]["bans"]["last"]) ? $this->globals["foreach"]["bans"]["last"]:null)) {
?>
			<br /><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Your IP address is<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <strong><?php echo $_SERVER['HTTP_X_FORWARDED_FOR'];?></strong>.<br /><br />
		<?php 
}?>

		<?php if (count((isset($this->scope["bans"]) ? $this->scope["bans"] : null)) > 1 && ! (isset($this->globals["foreach"]["bans"]["last"]) ? $this->globals["foreach"]["bans"]["last"]:null)) {
?>
			<hr />
		<?php 
}?>


	<?php 
/* -- foreach end output */
		$_fh0_glob["index"]+=1;
		$_fh0_glob["iteration"]+=1;
	}
}?>

</div>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>