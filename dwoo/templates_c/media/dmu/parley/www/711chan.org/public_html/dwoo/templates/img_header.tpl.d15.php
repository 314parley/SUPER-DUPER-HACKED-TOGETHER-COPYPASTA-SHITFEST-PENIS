<?php
if (function_exists('Dwoo_Plugin_capitalize')===false)
	$this->getLoader()->loadPlugin('capitalize');
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><script type="text/javascript" src="<?php echo $this->scope["cwebpath"];?>lib/javascript/protoaculous-compressed.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->scope["cwebpath"];?>css/img_global.css" />
<?php 
$_loop0_data = (isset($this->scope["ku_styles"]) ? $this->scope["ku_styles"] : null);
if ($this->isArray($_loop0_data) === true)
{
	foreach ($_loop0_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop0_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
	<link rel="<?php if ($this->scope != (isset($this->data["ku_defaultstyle"]) ? $this->data["ku_defaultstyle"]:null)) {
?>alternate <?php 
}?>stylesheet" type="text/css" href="<?php echo $this->data["cwebpath"];?>css/<?php echo $this->scope;?>.css" title="<?php echo Dwoo_Plugin_capitalize($this, $this->scope, false);?>" />
<?php 
/* -- loop end output */
		$this->setScope($_loop0_scope, true);
	}
}
?>

<?php if ((isset($this->scope["locale"]) ? $this->scope["locale"] : null) == 'ja') {
?>
	
	<style type="text/css">
		*{
			font-family: IPAMonaPGothic, Mona, 'MS PGothic', YOzFontAA97 !important;
			font-size: 1em;
		}
	</style>
	
<?php 
}?>

<?php if ((defined("KU_RSS") ? KU_RSS : null) != '') {
?>
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo KU_BOARDSPATH;?>/<?php echo $this->scope["board"]["name"];?>/rss.xml" />
<?php 
}?>

<script type="text/javascript"><!--
		var ku_boardspath = '<?php echo KU_BOARDSPATH;?>';
		var ku_cgipath = '<?php echo KU_CGIPATH;?>';
		var style_cookie = "kustyle";
<?php if ((isset($this->scope["replythread"]) ? $this->scope["replythread"] : null) > 0) {
?>
		var ispage = false;
<?php 
}
else {
?>
		var ispage = true;
<?php 
}?>

//--></script>
<script type="text/javascript" src="<?php echo KU_WEBPATH;?>/lib/javascript/kusaba.js"></script>
<script type="text/javascript"><!--
	var hiddenthreads = getCookie('hiddenthreads').split('!');
//--></script>
<?php if ((isset($this->scope["board"]["enablecaptcha"]) ? $this->scope["board"]["enablecaptcha"]:null) == 1) {
?>
	
		<script type="text/javascript"> var RecaptchaOptions = { theme : 'clean' }; </script>
	
<?php 
}?>

</head>
<body>
<div class="adminbar">
<?php if ((defined("KU_STYLESWITCHER") ? KU_STYLESWITCHER : null)) {
?>
	<?php if ((defined("KU_DROPSWITCHER") ? KU_DROPSWITCHER : null)) {
?>
		<select onchange="javascript:if(selectedIndex != 0)set_stylesheet(options[selectedIndex].value);return false;">
			<option><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Styles<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></option>
		<?php 
$_loop1_data = (isset($this->scope["ku_styles"]) ? $this->scope["ku_styles"] : null);
if ($this->isArray($_loop1_data) === true)
{
	foreach ($_loop1_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop1_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
			<option value="<?php echo Dwoo_Plugin_capitalize($this, $this->scope, false);?>"><?php echo Dwoo_Plugin_capitalize($this, $this->scope, false);?></option>;
		<?php 
/* -- loop end output */
		$this->setScope($_loop1_scope, true);
	}
}
?>

		</select>
	<?php 
}
else {
?>
		<?php 
$_loop2_data = (isset($this->scope["ku_styles"]) ? $this->scope["ku_styles"] : null);
if ($this->isArray($_loop2_data) === true)
{
	foreach ($_loop2_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop2_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
			[<a href="#" onclick="javascript:set_stylesheet('<?php echo Dwoo_Plugin_capitalize($this, $this->scope, false);?>');return false;"><?php echo Dwoo_Plugin_capitalize($this, $this->scope, false);?></a>]&nbsp;
		<?php 
/* -- loop end output */
		$this->setScope($_loop2_scope, true);
	}
}
?>

	<?php 
}?>

	<?php if (count((isset($this->scope["ku_styles"]) ? $this->scope["ku_styles"] : null)) > 0) {
?>
		-&nbsp;
	<?php 
}?>

<?php 
}?>

<?php if ((defined("KU_WATCHTHREADS") ? KU_WATCHTHREADS : null)) {
?>
	[<a href="#" onclick="javascript:showwatchedthreads();return false" title="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Watched Threads<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>">WT</a>]&nbsp;
<?php 
}?>

[<a href="<?php echo KU_WEBPATH;?>" target="_top"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Home<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>]&nbsp;[<a href="<?php echo KU_CGIPATH;?>/manage.php" target="_top"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Manage<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>]
</div>
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
<?php if ((defined("KU_WATCHTHREADS") ? KU_WATCHTHREADS : null) && ! (isset($this->scope["isoekaki"]) ? $this->scope["isoekaki"] : null) && ! (isset($this->scope["hidewatchedthreads"]) ? $this->scope["hidewatchedthreads"] : null)) {
?>
				<script type="text/javascript"><!--
				if (getCookie('showwatchedthreads') == '1') {
				document.write('<div id="watchedthreads" style="top: <?php echo $this->scope["ad_top"];?>px; left: 25px;" class="watchedthreads"><div class="postblock" id="watchedthreadsdraghandle" style="width: 100%;"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Watched Threads<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?><\/div><span id="watchedthreadlist"><\/span><div id="watchedthreadsbuttons"><a href="#" onclick="javascript:hidewatchedthreads();return false;" title="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Hide the watched threads box<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>"><img src="<?php echo $this->scope["cwebpath"];?>css/icons/blank.gif" border="0" class="hidewatchedthreads" alt="hide" /><\/a>&nbsp;<a href="#" onclick="javascript:getwatchedthreads(\'0\', \'<?php echo $this->scope["board"]["name"];?>\');return false;" title="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Refresh watched threads<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>"><img src="<?php echo $this->scope["cwebpath"];?>css/icons/blank.gif" border="0" class="refreshwatchedthreads" alt="refresh" /><\/a><\/div><\/div>');
				watchedthreadselement = document.getElementById('watchedthreads');
				watchedthreadselement.style.top = getCookie('watchedthreadstop');
				watchedthreadselement.style.left = getCookie('watchedthreadsleft');
				watchedthreadselement.style.width = Math.max(250,getCookie('watchedthreadswidth')) + 'px';
				watchedthreadselement.style.height = Math.max(75,getCookie('watchedthreadsheight')) + 'px';
				getwatchedthreads('<!sm_threadid>', '<?php echo $this->scope["board"]["name"];?>');
			}
			//--></script>
<?php 
}?>


<div class="logo">
<?php if ((defined("KU_HEADERURL") ? KU_HEADERURL : null) != '' && (isset($this->scope["board"]["image"]) ? $this->scope["board"]["image"]:null) == '') {
?>
	<img src="<?php echo KU_HEADERURL;?>" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Logo<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" /><br />
<?php 
}
elseif ((isset($this->scope["board"]["image"]) ? $this->scope["board"]["image"]:null) != '' && (isset($this->scope["board"]["image"]) ? $this->scope["board"]["image"]:null) != "none") {
?>
	<img src="<?php echo $this->scope["board"]["image"];?>" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Logo<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" /><br />
<?php 
}?>

<?php if ((defined("KU_DIRTITLE") ? KU_DIRTITLE : null)) {
?>
	/<?php echo $this->scope["board"]["name"];?>/ - 
<?php 
}?>

<?php echo $this->scope["board"]["desc"];?></div>
<?php echo $this->scope["board"]["includeheader"];?>

<hr /><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>