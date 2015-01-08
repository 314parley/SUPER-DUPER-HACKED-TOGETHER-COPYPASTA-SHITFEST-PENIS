<?php
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
if (! (isset($this->scope["isread"]) ? $this->scope["isread"] : null)) {
?>
	<table class="userdelete">
	<tbody>
	<tr>
	<td>
	<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Delete post<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

	[<input type="checkbox" name="fileonly" id="fileonly" value="on" /><label for="fileonly"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File Only<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></label>]<br /><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Password<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

	<input type="password" name="postpassword" size="8" />&nbsp;<input name="deletepost" value="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Delete<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" type="submit" />

	<?php if ((isset($this->scope["board"]["enablereporting"]) ? $this->scope["board"]["enablereporting"]:null) == 1) {
?>
		</td>
		</tr>
		<tr>
		<td>
		<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Report post<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?><br />
		<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Reason<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

		<input type="text" name="reportreason" size="10" />&nbsp;<input name="reportpost" value="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Report<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" type="submit" />	
	<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);
 $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);

}?>


	</td>
	</tr>
	</tbody>
	</table>
	</form>

	<script type="text/javascript"><!--
		set_delpass("delform");
	//--></script>
<?php 
}?>

<?php if ((isset($this->scope["replythread"]) ? $this->scope["replythread"] : null) == 0) {
?>
	<table border="1">
	<tbody>
		<tr>
			<td>
				<?php if ((isset($this->scope["thispage"]) ? $this->scope["thispage"] : null) == 0) {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Previous<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php 
}
else {
?>
					<form method="get" action="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/<?php if (( ((isset($this->scope["thispage"]) ? $this->scope["thispage"] : null) - 1) ) != 0) {

echo ($this->scope["thispage"] - 1);?>.html<?php 
}?>">
						<input value="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Previous<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" type="submit" /></form>
				<?php 
}?>

			</td>
			<td>
				&#91;<?php if ((isset($this->scope["thispage"]) ? $this->scope["thispage"] : null) != 0) {
?><a href="<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["board"]["name"];?>/"><?php 
}?>0<?php if ((isset($this->scope["thispage"]) ? $this->scope["thispage"] : null) != 0) {
?></a><?php 
}?>&#93;
				<?php $this->globals['section']['pages'] = array();
$_section0 =& $this->globals['section']['pages'];
$_section0['loop'] = is_array($tmp = (isset($this->scope["numpages"]) ? $this->scope["numpages"] : null)) ? count($tmp) : max(0, (int) $tmp);
$_section0['show'] = true;
$_section0['name'] = 'pages';
$_section0['max'] = $_section0['loop'];
$_section0['step'] = 1;
$_section0['start'] = $_section0['step'] > 0 ? 0 : $_section0['loop'] - 1;
if ($_section0['start'] < 0) { $_section0['start'] = max($_section0['step'] > 0 ? 0 : -1, $_section0['loop'] + $_section0['start']); } 
else { $_section0['start'] = min($_section0['start'], $_section0['step'] > 0 ? $_section0['loop'] : $_section0['loop'] -1); }
if ($_section0['show']) {
	$_section0['total'] = $_section0['loop'];
	if ($_section0['total'] == 0) {
		$_section0['show'] = false;
	}
} else {
	$_section0['total'] = 0;
}
if ($_section0['show']) {
	for ($this->scope['pages'] = $_section0['start'], $_section0['iteration'] = 1; $_section0['iteration'] <= $_section0['total']; $this->scope['pages'] += $_section0['step'], $_section0['iteration']++) {
		$_section0['rownum'] = $_section0['iteration'];
		$_section0['index_prev'] = $this->scope['pages'] - $_section0['step'];
		$_section0['index_next'] = $this->scope['pages'] + $_section0['step'];
		$_section0['first']	= ($_section0['iteration'] == 1);
		$_section0['last']	= ($_section0['iteration'] == $_section0['total']);
?>
				&#91;<?php if ((isset($this->globals["section"]["pages"]["iteration"]) ? $this->globals["section"]["pages"]["iteration"]:null) != (isset($this->scope["thispage"]) ? $this->scope["thispage"] : null)) {?><a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/<?php echo $this->globals["section"]["pages"]["iteration"];?>.html"><?php }
echo $this->globals["section"]["pages"]["iteration"];
if ((isset($this->globals["section"]["pages"]["iteration"]) ? $this->globals["section"]["pages"]["iteration"]:null) != (isset($this->scope["thispage"]) ? $this->scope["thispage"] : null)) {?></a><?php }?>&#93;
				<?php 
	}
} ?>	
			</td>
			<td>
				<?php if ((isset($this->scope["thispage"]) ? $this->scope["thispage"] : null) == (isset($this->scope["numpages"]) ? $this->scope["numpages"] : null)) {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Next<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php 
}
else {
?>
					<form method="get" action="<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["board"]["name"];?>/<?php echo ($this->scope["thispage"] + 1);?>.html"><input value="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Next<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" type="submit" /></form>
				<?php 
}?>

	
			</td>
		</tr>
	</tbody>
	</table>
<?php 
}?>

<br />
<?php if ((isset($this->scope["boardlist"]) ? $this->scope["boardlist"] : null)) {
?>
	<div class="navbar">
	<?php if ((defined("KU_GENERATEBOARDLIST") ? KU_GENERATEBOARDLIST : null)) {
?>
		<?php 
$_fh1_data = (isset($this->scope["boardlist"]) ? $this->scope["boardlist"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['sect'])
	{
/* -- foreach start output */
?>
			[
			<?php 
$_fh0_data = (isset($this->scope["sect"]) ? $this->scope["sect"] : null);
$this->globals["foreach"]['brds'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->isArray($_fh0_data) ? count($_fh0_data) : 0,
);
$_fh0_glob =& $this->globals["foreach"]['brds'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['brd'])
	{
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */
?>
				<a title="<?php echo $this->scope["brd"]["desc"];?>" href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["brd"]["name"];?>/"><?php echo $this->scope["brd"]["name"];?></a><?php if ((isset($this->globals["foreach"]["brds"]["last"]) ? $this->globals["foreach"]["brds"]["last"]:null)) {


}
else {
?> / <?php 
}?>

			<?php 
/* -- foreach end output */
		$_fh0_glob["iteration"]+=1;
	}
}?>

			]
		<?php 
/* -- foreach end output */
	}
}?>

	<?php 
}
else {
?>
		<?php if (is_file((isset($this->scope["boardlist"]) ? $this->scope["boardlist"] : null))) {
?>
			<?php echo Dwoo_Plugin_include($this, (isset($this->scope["boardlist"]) ? $this->scope["boardlist"] : null), null, null, null, '_root', null);?>

		<?php 
}?>

	<?php 
}?>

	</div>
<?php 
}?>

<br />
<div class="footer" style="clear: both;">
	- <a href="http://kusabax.cultnet.net/" target="_top">kusaba x <?php echo KU_VERSION;?></a>
	<?php if ((isset($this->scope["executiontime"]) ? $this->scope["executiontime"] : null) != '') {
?> + <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Took<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <?php echo $this->scope["executiontime"];?>s -<?php 
}?>

	<?php if ((isset($this->scope["botads"]) ? $this->scope["botads"] : null) != '') {
?>
		<div class="content ads">
			<center> 
				<?php echo $this->scope["botads"];?>

			</center>
		</div>
	<?php 
}?>

</div>			
<!-- Start Open Web Analytics Tracker -->
<script type="text/javascript">
//<![CDATA[
var owa_baseUrl = 'http://anal.314chan.org/';
var owa_cmds = owa_cmds || [];
owa_cmds.push(['setSiteId', '3b255593e892e38748ef9756495909b9']);
owa_cmds.push(['trackPageView']);
owa_cmds.push(['trackClicks']);
owa_cmds.push(['trackDomStream']);

(function() {
	var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
	owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
	_owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
	var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
}());
//]]>
</script>
<!-- End Open Web Analytics Code --><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>