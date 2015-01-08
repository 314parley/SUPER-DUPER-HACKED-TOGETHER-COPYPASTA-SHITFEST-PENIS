<?php
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
if (function_exists('Dwoo_Plugin_date_format')===false)
	$this->getLoader()->loadPlugin('date_format');
ob_start(); /* template body */ ?><div class="postarea">
<a id="postbox"></a>
<form name="postform" id="postform" action="<?php echo KU_CGIPATH;?>/board.php" method="post" enctype="multipart/form-data"
<?php if ((isset($this->scope["board"]["enablecaptcha"]) ? $this->scope["board"]["enablecaptcha"]:null) == 1) {
?>
	onsubmit="return checkcaptcha('postform');"
<?php 
}?>

>
<input type="hidden" name="board" value="<?php echo $this->scope["board"]["name"];?>" />
<input type="hidden" name="replythread" value="<!sm_threadid>" />
<?php if ((isset($this->scope["board"]["maximagesize"]) ? $this->scope["board"]["maximagesize"]:null) > 0) {
?>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->scope["board"]["maximagesize"];?>" />
<?php 
}?>

<input type="text" name="email" size="28" maxlength="75" value="" style="display: none;" />
<table class="postform">
	<tbody>
	<?php if ((isset($this->scope["board"]["forcedanon"]) ? $this->scope["board"]["forcedanon"]:null) != 1) {
?>
		<tr>
			<td class="postblock">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Name<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></td>
			<td>
				<input type="text" name="name" size="28" maxlength="75" accesskey="n" autocomplete="off"/>
			</td>
		</tr>
	<?php 
}?>

	<tr>
		<td class="postblock">
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Email<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></td>
		<td>
			<input type="text" name="em" size="28" maxlength="75" accesskey="e" autocomplete="off"/>
		</td>
	</tr>
	<tr>

		<td class="postblock">
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Subject<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		</td>
		<td>
			<input type="text" name="subject" size="35" maxlength="75" accesskey="s" autocomplete="off"/>&nbsp;<input type="submit" value="<?php if ((defined("KU_QUICKREPLY") ? KU_QUICKREPLY : null) && (isset($this->scope["replythread"]) ? $this->scope["replythread"] : null) == 0) {
if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Submit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" accesskey="z" />&nbsp;(<span id="posttypeindicator"><?php if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>new thread<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></span>)<?php }
elseif ((defined("KU_QUICKREPLY") ? KU_QUICKREPLY : null) && (isset($this->scope["replythread"]) ? $this->scope["replythread"] : null) != 0) {
if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Reply<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" accesskey="z" />&nbsp;(<span id="posttypeindicator"><?php if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>reply to<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <!sm_threadid></span>)<?php }
else {
if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Submit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" accesskey="z" /><?php }?>

		</td>
	</tr>
	<tr>
		<td class="postblock">
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Message<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		</td>
		<td>
			<textarea name="message" cols="48" rows="4" accesskey="m"></textarea>
		</td>
	</tr>
	<?php if ((isset($this->scope["board"]["enablecaptcha"]) ? $this->scope["board"]["enablecaptcha"]:null) == 1) {
?>
		<tr>
			<td class="postblock"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Captcha<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></td>
			<td colspan="2"><?php echo $this->scope["recaptcha"];?></td>
		</tr>
	<?php 
}?>

	<?php if ((isset($this->scope["board"]["uploadtype"]) ? $this->scope["board"]["uploadtype"]:null) == 0 || (isset($this->scope["board"]["uploadtype"]) ? $this->scope["board"]["uploadtype"]:null) == 1) {
?>
		<tr>
			<td class="postblock">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			</td>
			<td>
			<input type="file" name="imagefile" size="35" accesskey="f" />
			<?php if ((isset($this->scope["replythread"]) ? $this->scope["replythread"] : null) == 0 && (isset($this->scope["board"]["enablenofile"]) ? $this->scope["board"]["enablenofile"]:null) == 1) {
?>
				[<input type="checkbox" name="nofile" id="nofile" accesskey="q" /><label for="nofile"> <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>No File<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></label>]
			<?php 
}?>

			</td>
		</tr>
	<?php 
}?>

	<?php if (( (isset($this->scope["board"]["uploadtype"]) ? $this->scope["board"]["uploadtype"]:null) == 1 || (isset($this->scope["board"]["uploadtype"]) ? $this->scope["board"]["uploadtype"]:null) == 2 ) && (isset($this->scope["board"]["embeds_allowed"]) ? $this->scope["board"]["embeds_allowed"]:null) != '') {
?>
		<tr>
			<td class="postblock">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Embed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			</td>
			<td>
				<input type="text" name="embed" size="28" maxlength="75" accesskey="e" />&nbsp;<select name="embedtype">
				<?php 
$_fh0_data = (isset($this->scope["embeds"]) ? $this->scope["embeds"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['embed'])
	{
/* -- foreach start output */
?>
					<?php if (in_array((isset($this->scope["embed"]["filetype"]) ? $this->scope["embed"]["filetype"]:null), explode(',', (isset($this->scope["board"]["embeds_allowed"]) ? $this->scope["board"]["embeds_allowed"]:null)))) {
?>
						<option value="<?php echo mb_strtolower((string) (isset($this->scope["embed"]["name"]) ? $this->scope["embed"]["name"]:null), $this->charset);?>"><?php echo $this->scope["embed"]["name"];?></option>
					<?php 
}?>

				<?php 
/* -- foreach end output */
	}
}?>

				</select>
				<a class="rules" href="#postbox" onclick="window.open('<?php echo KU_WEBPATH;?>/embedhelp.php','embedhelp','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=300,height=210');return false;">Help</a>
			</td>
		</tr>
	<?php 
}?>

		<tr>
			<td class="postblock">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Password<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			</td>
			<td>
				<input type="password" name="postpassword" size="8" accesskey="p" autocomplete="off"/>&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>(for post and file deletion)<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			</td>
		</tr>
		<tr id="passwordbox"><td></td><td></td></tr>
		<tr>
			<td colspan="2" class="rules">
				<ul style="margin-left: 0; margin-top: 0; margin-bottom: 0; padding-left: 0;">
					<li><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Supported file types are<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>:
					<?php if ((isset($this->scope["board"]["filetypes_allowed"]) ? $this->scope["board"]["filetypes_allowed"]:null) != '') {
?>
						<?php 
$_fh1_data = (isset($this->scope["board"]["filetypes_allowed"]) ? $this->scope["board"]["filetypes_allowed"]:null);
$this->globals["foreach"]['files'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->isArray($_fh1_data) ? count($_fh1_data) : 0,
);
$_fh1_glob =& $this->globals["foreach"]['files'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['filetype'])
	{
		$_fh1_glob["last"] = (string) ($_fh1_glob["iteration"] === $_fh1_glob["total"]);
/* -- foreach start output */
?>
							<?php echo mb_strtoupper((string) (isset($this->scope["filetype"]["0"]) ? $this->scope["filetype"]["0"]:null), $this->charset);
if ((isset($this->globals["foreach"]["files"]["last"]) ? $this->globals["foreach"]["files"]["last"]:null)) {


}
else {
?>, <?php 
}?>

						<?php 
/* -- foreach end output */
		$_fh1_glob["iteration"]+=1;
	}
}?>

					<?php 
}
else {
?>
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>None<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					<?php 
}?>

					</li>
					<li><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Maximum file size allowed is<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <?php echo (round((isset($this->scope["board"]["maximagesize"]) ? $this->scope["board"]["maximagesize"]:null)/1024/1024));?> MB.</li>
					<li><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(1 => (defined("KU_THUMBWIDTH") ? KU_THUMBWIDTH : null),2 => (defined("KU_THUMBHEIGHT") ? KU_THUMBHEIGHT : null),); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Images greater than %1x%2 pixels will be thumbnailed.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></li>
					<li><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(1 => (isset($this->scope["board"]["uniqueposts"]) ? $this->scope["board"]["uniqueposts"]:null),); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Currently %1 unique user posts.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					<?php if ((isset($this->scope["board"]["enablecatalog"]) ? $this->scope["board"]["enablecatalog"]:null) == 1) {
?> 
						<a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/catalog.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>View catalog<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>
					<?php 
}?>

					</li>
				</ul>
			<?php if ((defined("KU_BLOTTER") ? KU_BLOTTER : null) && (isset($this->scope["blotter"]) ? $this->scope["blotter"] : null)) {
?>
				<br />
				<ul style="margin-left: 0; margin-top: 0; margin-bottom: 0; padding-left: 0;">
				<li style="position: relative;">
					<span style="color: red;">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Blotter updated<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>: <?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["blotter_updated"]) ? $this->scope["blotter_updated"] : null), "%Y-%m-%d", null);?>

				</span>
					<span style="color: red;text-align: right;position: absolute;right: 0px;">
						<a href="#" onclick="javascript:toggleblotter(true);return false;"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Show/Hide<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a> <a href="<?php echo KU_WEBPATH;?>/blotter.php"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Show All<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>
					</span>
				</li>
				<?php echo $this->scope["blotter"];?>

				</ul>
				<script type="text/javascript"><!--
				if (getCookie('ku_showblotter') == '1') {
					toggleblotter(false);
				}
				--></script>
			<?php 
}?>

			</td>
		</tr>
	</tbody>

</table>
</form>
<hr />
<?php if ((isset($this->scope["topads"]) ? $this->scope["topads"] : null) != '') {
?>
	<div class="content ads">
		<center> 
			<?php echo $this->scope["topads"];?>

		</center>
	</div>
	<hr />
<?php 
}?>

</div>
<script type="text/javascript"><!--
				set_inputs("postform");
				//--></script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>