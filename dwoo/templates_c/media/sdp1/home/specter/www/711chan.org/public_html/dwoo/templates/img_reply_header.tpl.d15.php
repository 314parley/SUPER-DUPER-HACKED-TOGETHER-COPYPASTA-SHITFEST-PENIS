<?php
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
ob_start(); /* template body */ ?>&#91;<a href="<?php echo KU_WEBFOLDER;
echo $this->scope["board"]["name"];?>/"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Return<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>&#93;
<?php if ((defined("KU_FIRSTLAST") ? KU_FIRSTLAST : null) && ( count((isset($this->scope["posts"]) ? $this->scope["posts"] : null)) > 50 || (isset($this->scope["replycount"]) ? $this->scope["replycount"] : null) > 50 )) {
?>
	&#91;<a href="<?php echo KU_WEBFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["posts"]["0"]["id"];?>.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Entire Thread<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>&#93; 
	&#91;<a href="<?php echo KU_WEBFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["posts"]["0"]["id"];?>+50.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Last 50 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>&#93;
	<?php if (( count((isset($this->scope["posts"]) ? $this->scope["posts"] : null)) > 100 || (isset($this->scope["replycount"]) ? $this->scope["replycount"] : null) > 100 )) {
?>
		&#91;<a href="<?php echo KU_WEBFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["posts"]["0"]["id"];?>-100.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>First 100 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>&#93;
	<?php 
}?>

<?php 
}?>

<?php if (! (isset($this->scope["isread"]) ? $this->scope["isread"] : null)) {
?>
	<div class="replymode"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Posting mode: Reply<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

	<?php if ((isset($this->scope["modifier"]) ? $this->scope["modifier"] : null) == 'first100') {
?>
		[<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>First 100 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>]
	<?php 
}
elseif ((isset($this->scope["modifier"]) ? $this->scope["modifier"] : null) == 'last50') {
?>
		[<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Last 50 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>]
	<?php 
}?>

<?php 
}
else {
?>
	&#91;<a href="<?php echo KU_WEBFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["posts"]["0"]["id"];?>.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Entire Thread<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>&#93; 
<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>