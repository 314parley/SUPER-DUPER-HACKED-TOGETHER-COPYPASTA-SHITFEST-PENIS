<?php
if (function_exists('smarty_block_t')===false)
	$this->getLoader()->loadPlugin('t');
ob_start(); /* template body */ ?><form id="delform" action="<?php echo KU_CGIPATH;?>/board.php" method="post">
<input type="hidden" name="board" value="<?php echo $this->scope["board"]["name"];?>" />
<?php 
$_fh1_data = (isset($this->scope["posts"]) ? $this->scope["posts"] : null);
$this->globals["foreach"]['thread'] = array
(
	"iteration"		=> 1,
);
$_fh1_glob =& $this->globals["foreach"]['thread'];
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['postsa'])
	{
/* -- foreach start output */
?>
	<?php 
$_fh0_data = (isset($this->scope["postsa"]) ? $this->scope["postsa"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['postkey']=>$this->scope['post'])
	{
/* -- foreach start output */
?>
		<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {
?>
			<span id="unhidethread<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>" style="display: none;">
			<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Thread<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["post"]["id"];?>.html"><?php echo $this->scope["post"]["id"];?></a> <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>hidden.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			<a href="#" onclick="javascript:togglethread('<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>');return false;" title="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Un-Hide Thread<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>">
				<img src="<?php echo $this->scope["cwebpath"];?>css/icons/blank.gif" border="0" class="unhidethread" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Un-Hide Thread<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
			</a>
	</span>
	<div id="thread<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>">
	<script type="text/javascript"><!--
		if (hiddenthreads.toString().indexOf('<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>')!==-1) {
			document.getElementById('unhidethread<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>').style.display = 'block';
			document.getElementById('thread<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>').style.display = 'none';
		}
		//--></script>
			<a name="s<?php echo $this->globals["foreach"]["thread"]["iteration"];?>"></a>
			
			<?php if (( (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != '' ) && ( ( (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '' && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' ) && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != 'removed' )) {
?>
				<span class="filesize">
				<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'mp3') {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Audio<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php 
}
else {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

				<?php 
}?>

				<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'jpg' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'gif' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'png' && (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '') {
?>
					<a 
					<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
						target="_blank" 
					<?php 
}?>

					href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
				<?php 
}
else {
?>
					<a href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>" onclick="javascript:expandimg('<?php echo $this->scope["post"]["id"];?>', '<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>', '<?php echo $this->scope["file_path"];?>/thumb/<?php echo $this->scope["post"]["file"];?>s.<?php echo $this->scope["post"]["file_type"];?>', '<?php echo $this->scope["post"]["image_w"];?>', '<?php echo $this->scope["post"]["image_h"];?>', '<?php echo $this->scope["post"]["thumb_w"];?>', '<?php echo $this->scope["post"]["thumb_h"];?>');return false;">
				<?php 
}?>

				<?php if (((isset($this->scope["post"]["id3"]["comments_html"]) ? $this->scope["post"]["id3"]["comments_html"]:null) !== null)) {
?>
					<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["artist"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["artist"]["0"]:null) != '') {
?>
					<?php echo $this->scope["post"]["id3"]["comments_html"]["artist"]["0"];?>

						<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>
							- 
						<?php 
}?>

					<?php 
}?>

					<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>
						<?php echo $this->scope["post"]["id3"]["comments_html"]["title"]["0"];?>

					<?php 
}?>

					</a>
				<?php 
}
else {
?>
					<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?></a>
				<?php 
}?>

				- (<?php echo $this->scope["post"]["file_size_formatted"];?>

				<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["bitrate"]) ? $this->scope["post"]["id3"]["comments_html"]["bitrate"]:null) != 0 || (isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
					<?php if ((isset($this->scope["post"]["id3"]["audio"]["bitrate"]) ? $this->scope["post"]["id3"]["audio"]["bitrate"]:null) != 0) {
?>
						- <?php echo round((isset($this->scope["post"]["id3"]["audio"]["bitrate"]) ? $this->scope["post"]["id3"]["audio"]["bitrate"]:null)/1000);?> kbps
						<?php if ((isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
							- 
						<?php 
}?>

					<?php 
}?>

					<?php if ((isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
						<?php echo $this->scope["post"]["id3"]["audio"]["sample_rate"]/1000;?> kHz
					<?php 
}?>

				<?php 
}?>

				<?php if ((isset($this->scope["post"]["image_w"]) ? $this->scope["post"]["image_w"]:null) > 0 && (isset($this->scope["post"]["image_h"]) ? $this->scope["post"]["image_h"]:null) > 0) {
?>
					, <?php echo $this->scope["post"]["image_w"];?>x<?php echo $this->scope["post"]["image_h"];?>

				<?php 
}?>

				<?php if ((isset($this->scope["post"]["file_original"]) ? $this->scope["post"]["file_original"]:null) != '' && (isset($this->scope["post"]["file_original"]) ? $this->scope["post"]["file_original"]:null) != (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null)) {
?>
					, <?php echo $this->scope["post"]["file_original"];?>.<?php echo $this->scope["post"]["file_type"];?>

				<?php 
}?>

				)
				<?php if ((isset($this->scope["post"]["id3"]["playtime_string"]) ? $this->scope["post"]["id3"]["playtime_string"]:null) != '') {
?>
					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Length<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>: <?php echo $this->scope["post"]["id3"]["playtime_string"];?>

				<?php 
}?>

				</span>
				<?php if ((defined("KU_THUMBMSG") ? KU_THUMBMSG : null)) {
?>
					<span class="thumbnailmsg"> 
					<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'jpg' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'gif' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'png' && (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '') {
?>
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Extension icon displayed, click image to open file.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					<?php 
}
else {
?>
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Thumbnail displayed, click image for full size.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					<?php 
}?>

					</span>
				<?php 
}?>

				<br />
			<?php 
}?>

			<?php if ((isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '' && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' && ( (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'jpg' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'gif' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'png' )) {
?>
				<?php if ((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) == 'removed') {
?>
					<div class="nothumb">
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<br />Removed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					</div>
				<?php 
}
else {
?>
					<a 
					<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
						target="_blank" 
					<?php 
}?>

					href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
					<span id="thumb<?php echo $this->scope["post"]["id"];?>"><img src="<?php echo $this->scope["file_path"];?>/thumb/<?php echo $this->scope["post"]["file"];?>s.<?php echo $this->scope["post"]["file_type"];?>" alt="<?php echo $this->scope["post"]["id"];?>" class="thumb" height="<?php echo $this->scope["post"]["thumb_h"];?>" width="<?php echo $this->scope["post"]["thumb_w"];?>" /></span>
					</a>
				<?php 
}?>

			
			<?php 
}
elseif ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'webm') {
?>
				<?php if ((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) == 'removed') {
?>
					<div class="nothumb">
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<br />Removed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					</div>
				<?php 
}
else {
?>
						<a 
						<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
						target="_blank" 
						<?php 
}?>

						href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
						
<span id="thumb<?php echo $this->scope["post"]["id"];?>"><img src="<?php echo $this->scope["file_path"];?>/thumb/<?php echo $this->scope["post"]["file"];?>webm.jpg" alt="<?php echo $this->scope["post"]["id"];?>" class="webmthumb" /></span>
						</a>
				<?php 
}?>

			
			<?php 
}
elseif ((isset($this->scope["post"]["nonstandard_file"]) ? $this->scope["post"]["nonstandard_file"]:null) != '') {
?>
				<?php if ((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) == 'removed') {
?>
					<div class="nothumb">
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<br />Removed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					</div>
				<?php 
}
else {
?>
					<a 
					<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
						target="_blank" 
					<?php 
}?>

					href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
					<span id="thumb<?php echo $this->scope["post"]["id"];?>"><img src="<?php echo $this->scope["post"]["nonstandard_file"];?>" alt="<?php echo $this->scope["post"]["id"];?>" class="thumb" height="<?php echo $this->scope["post"]["thumb_h"];?>" width="<?php echo $this->scope["post"]["thumb_w"];?>" /></span>
					</a>
				<?php 
}?>

			<?php 
}?>

			<a name="<?php echo $this->scope["post"]["id"];?>"></a>
			<label>
			<input type="checkbox" name="post[]" value="<?php echo $this->scope["post"]["id"];?>" />
			<?php if ((isset($this->scope["post"]["subject"]) ? $this->scope["post"]["subject"]:null) != '') {
?>
				<span class="filetitle">
					<?php echo $this->scope["post"]["subject"];?>

				</span>
			<?php 
}?>

			<span class="postername"><?php if ((isset($this->scope["post"]["email"]) ? $this->scope["post"]["email"]:null) && (isset($this->scope["board"]["anonymous"]) ? $this->scope["board"]["anonymous"]:null)) {?><a href="mailto:<?php echo $this->scope["post"]["email"];?>"><?php }
if ((isset($this->scope["post"]["name"]) ? $this->scope["post"]["name"]:null) == '' && (isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) == '') {
echo $this->scope["board"]["anonymous"];
}
elseif ((isset($this->scope["post"]["name"]) ? $this->scope["post"]["name"]:null) == '' && (isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) != '') {
}
else {
echo $this->scope["post"]["name"];
}
if ((isset($this->scope["post"]["email"]) ? $this->scope["post"]["email"]:null) != '' && (isset($this->scope["board"]["anonymous"]) ? $this->scope["board"]["anonymous"]:null) != '') {?></a><?php }?></span><?php if ((isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) != '') {?><span class="postertrip">!<?php echo $this->scope["post"]["tripcode"];?></span><?php }?>

			<?php if ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 1) {
?>
				<span class="admin">
					&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Admin<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
				</span>
			<?php 
}
elseif ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 4) {
?>
				<span class="mod">
					&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Super Mod<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
				</span>
			<?php 
}
elseif ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 2) {
?>
				<span class="mod">
					&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Mod<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
				</span>
			<?php 
}?>

			<?php echo $this->scope["post"]["timestamp_formatted"];?>

			</label>
			<span class="reflink">
				<?php echo $this->scope["post"]["reflink"];?>

			</span>
			<?php if ((isset($this->scope["board"]["showid"]) ? $this->scope["board"]["showid"]:null)) {
?>
				ID: <?php echo substr((isset($this->scope["post"]["ipmd5"]) ? $this->scope["post"]["ipmd5"]:null), 0, 6);?>

			<?php 
}?>

			<span class="extrabtns">
			<?php if ((isset($this->scope["post"]["locked"]) ? $this->scope["post"]["locked"]:null) == 1) {
?>
				<img style="border: 0;" src="<?php echo $this->scope["boardpath"];?>css/locked.gif" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Locked<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
			<?php 
}?>

			<?php if ((isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 1) {
?>
				<img style="border: 0;" src="<?php echo $this->scope["boardpath"];?>css/sticky.gif" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Stickied<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
			<?php 
}?>

			<span id="hide<?php echo $this->scope["post"]["id"];?>"><a href="#" onclick="javascript:togglethread('<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}
echo $this->scope["board"]["name"];?>');return false;" title="Hide Thread"><img src="<?php echo $this->scope["boardpath"];?>css/icons/blank.gif" border="0" class="hidethread" alt="hide" /></a></span>
			<?php if ((defined("KU_WATCHTHREADS") ? KU_WATCHTHREADS : null)) {
?>
				<a href="#" onclick="javascript:addtowatchedthreads('<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}?>','<?php echo $this->scope["board"]["name"];?>');return false;" title="Watch Thread"><img src="<?php echo $this->scope["boardpath"];?>css/icons/blank.gif" border="0" class="watchthread" alt="watch" /></a>
			<?php 
}?>

			<?php if ((defined("KU_EXPAND") ? KU_EXPAND : null) && (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) && ( (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) + (defined("KU_REPLIES") ? KU_REPLIES : null) ) < 300) {
?>
				<a href="#" onclick="javascript:expandthread('<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}?>','<?php echo $this->scope["board"]["name"];?>');return false;" title="Expand Thread"><img src="<?php echo $this->scope["boardpath"];?>css/icons/blank.gif" border="0" class="expandthread" alt="expand" /></a>
			<?php 
}?>

			<?php if ((defined("KU_QUICKREPLY") ? KU_QUICKREPLY : null)) {
?>
				<a href="#postbox" onclick="javascript:quickreply('<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}?>');" title="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Quick Reply<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>"><img src="<?php echo $this->scope["boardpath"];?>css/icons/blank.gif" border="0" class="quickreply" alt="quickreply" /></a>
			<?php 
}?>

			</span>
			<span id="dnb-<?php echo $this->scope["board"]["name"];?>-<?php echo $this->scope["post"]["id"];?>-y"></span>
			[<a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}?>.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Reply<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>]
			<?php if ((defined("KU_FIRSTLAST") ? KU_FIRSTLAST : null) && ( ( (isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 1 && (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) + (defined("KU_REPLIESSTICKY") ? KU_REPLIESSTICKY : null) > 50 ) || ( (isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 0 && (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) + (defined("KU_REPLIES") ? KU_REPLIES : null) > 50 ) )) {
?>
				<?php if (( ( (isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 1 && (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) + (defined("KU_REPLIESSTICKY") ? KU_REPLIESSTICKY : null) > 100 ) || ( (isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 0 && (isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) + (defined("KU_REPLIES") ? KU_REPLIES : null) > 100 ) )) {
?>
					[<a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {

echo $this->scope["post"]["id"];

}
else {

echo $this->scope["post"]["parentid"];

}?>-100.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>First 100 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>]
				<?php 
}?>

				[<a href="<?php echo KU_BOARDSFOLDER;
echo $this->scope["board"]["name"];?>/res/<?php echo $this->scope["post"]["id"];?>+50.html"><?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Last 50 posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?></a>]
			<?php 
}?>

			<br />
		<?php 
}
else {
?>
			<table>
				<tbody>
				<tr>
					<td class="doubledash">
						&gt;&gt;
					</td>
					<td class="reply" id="reply<?php echo $this->scope["post"]["id"];?>">
						<a name="<?php echo $this->scope["post"]["id"];?>"></a>
						<label>
						<input type="checkbox" name="post[]" value="<?php echo $this->scope["post"]["id"];?>" />
						
						
						<?php if ((isset($this->scope["post"]["subject"]) ? $this->scope["post"]["subject"]:null) != '') {
?>
							<span class="filetitle">
								<?php echo $this->scope["post"]["subject"];?>

							</span>
						<?php 
}?>

						<span class="postername"><?php if ((isset($this->scope["post"]["email"]) ? $this->scope["post"]["email"]:null) && (isset($this->scope["board"]["anonymous"]) ? $this->scope["board"]["anonymous"]:null)) {?><a href="mailto:<?php echo $this->scope["post"]["email"];?>"><?php }
if ((isset($this->scope["post"]["name"]) ? $this->scope["post"]["name"]:null) == '' && (isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) == '') {
echo $this->scope["board"]["anonymous"];
}
elseif ((isset($this->scope["post"]["name"]) ? $this->scope["post"]["name"]:null) == '' && (isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) != '') {
}
else {
echo $this->scope["post"]["name"];
}
if ((isset($this->scope["post"]["email"]) ? $this->scope["post"]["email"]:null) != '' && (isset($this->scope["board"]["anonymous"]) ? $this->scope["board"]["anonymous"]:null) != '') {?></a><?php }?></span><?php if ((isset($this->scope["post"]["tripcode"]) ? $this->scope["post"]["tripcode"]:null) != '') {?><span class="postertrip">!<?php echo $this->scope["post"]["tripcode"];?></span><?php }?>

						<?php if ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 1) {
?>
							<span class="admin">
								&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Admin<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
							</span>
						<?php 
}
elseif ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 4) {
?>
							<span class="mod">
								&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Super Mod<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
							</span>
						<?php 
}
elseif ((isset($this->scope["post"]["posterauthority"]) ? $this->scope["post"]["posterauthority"]:null) == 2) {
?>
							<span class="mod">
								&#35;&#35;&nbsp;<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Mod<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>&nbsp;&#35;&#35;
							</span>
						<?php 
}?>


						<?php echo $this->scope["post"]["timestamp_formatted"];?>

						</label>

						<span class="reflink">
							<?php echo $this->scope["post"]["reflink"];?>

						</span>
						<?php if ((isset($this->scope["board"]["showid"]) ? $this->scope["board"]["showid"]:null)) {
?>
							ID: <?php echo substr((isset($this->scope["post"]["ipmd5"]) ? $this->scope["post"]["ipmd5"]:null), 0, 6);?>

						<?php 
}?>

						<span class="extrabtns">
						<?php if ((isset($this->scope["post"]["locked"]) ? $this->scope["post"]["locked"]:null) == 1) {
?>
							<img style="border: 0;" src="<?php echo $this->scope["boardpath"];?>css/locked.gif" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Locked<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
						<?php 
}?>

						<?php if ((isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 1) {
?>
							<img style="border: 0;" src="<?php echo $this->scope["boardpath"];?>css/sticky.gif" alt="<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Stickied<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>" />
						<?php 
}?>

						</span>
						<span id="dnb-<?php echo $this->scope["board"]["name"];?>-<?php echo $this->scope["post"]["id"];?>-n"></span>
						<?php if (( (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != '' ) && ( ( (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '' && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' ) && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != 'removed' )) {
?>
							<br /><span class="filesize">
							<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'mp3') {
?>
								<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Audio<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

							<?php 
}
else {
?>
								<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

							<?php 
}?>

							<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'jpg' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'gif' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'png' && (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '') {
?>
								<a 
								<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
									target="_blank" 
								<?php 
}?>

								href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
							<?php 
}
else {
?>
								<a href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>" onclick="javascript:expandimg('<?php echo $this->scope["post"]["id"];?>', '<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>', '<?php echo $this->scope["file_path"];?>/thumb/<?php echo $this->scope["post"]["file"];?>s.<?php echo $this->scope["post"]["file_type"];?>', '<?php echo $this->scope["post"]["image_w"];?>', '<?php echo $this->scope["post"]["image_h"];?>', '<?php echo $this->scope["post"]["thumb_w"];?>', '<?php echo $this->scope["post"]["thumb_h"];?>');return false;">
							<?php 
}?>

							<?php if (((isset($this->scope["post"]["id3"]["comments_html"]) ? $this->scope["post"]["id3"]["comments_html"]:null) !== null)) {
?>
								<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["artist"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["artist"]["0"]:null) != '') {
?>
								<?php echo $this->scope["post"]["id3"]["comments_html"]["artist"]["0"];?>

									<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>
										- 
									<?php 
}?>

								<?php 
}?>

								<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>
									<?php echo $this->scope["post"]["id3"]["comments_html"]["title"]["0"];?>

								<?php 
}?>

								</a>
							<?php 
}
else {
?>
								<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?></a>
							<?php 
}?>

							- (<?php echo $this->scope["post"]["file_size_formatted"];?>

							<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["bitrate"]) ? $this->scope["post"]["id3"]["comments_html"]["bitrate"]:null) != 0 || (isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
								<?php if ((isset($this->scope["post"]["id3"]["audio"]["bitrate"]) ? $this->scope["post"]["id3"]["audio"]["bitrate"]:null) != 0) {
?>
									- <?php echo round((isset($this->scope["post"]["id3"]["audio"]["bitrate"]) ? $this->scope["post"]["id3"]["audio"]["bitrate"]:null)/1000);?> kbps
									<?php if ((isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
										- 
									<?php 
}?>

								<?php 
}?>

								<?php if ((isset($this->scope["post"]["id3"]["audio"]["sample_rate"]) ? $this->scope["post"]["id3"]["audio"]["sample_rate"]:null) != 0) {
?>
									<?php echo $this->scope["post"]["id3"]["audio"]["sample_rate"]/1000;?> kHz
								<?php 
}?>

							<?php 
}?>

							<?php if ((isset($this->scope["post"]["image_w"]) ? $this->scope["post"]["image_w"]:null) > 0 && (isset($this->scope["post"]["image_h"]) ? $this->scope["post"]["image_h"]:null) > 0) {
?>
								, <?php echo $this->scope["post"]["image_w"];?>x<?php echo $this->scope["post"]["image_h"];?>

							<?php 
}?>

							<?php if ((isset($this->scope["post"]["file_original"]) ? $this->scope["post"]["file_original"]:null) != '' && (isset($this->scope["post"]["file_original"]) ? $this->scope["post"]["file_original"]:null) != (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null)) {
?>
								, <?php echo $this->scope["post"]["file_original"];?>.<?php echo $this->scope["post"]["file_type"];?>

							<?php 
}?>

							)
							<?php if ((isset($this->scope["post"]["id3"]["playtime_string"]) ? $this->scope["post"]["id3"]["playtime_string"]:null) != '') {
?>
								<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Length<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>: <?php echo $this->scope["post"]["id3"]["playtime_string"];?>

							<?php 
}?>

							</span>
							<?php if ((defined("KU_THUMBMSG") ? KU_THUMBMSG : null)) {
?>
								<span class="thumbnailmsg"> 
								<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'jpg' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'gif' && (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) != 'png' && (isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '') {
?>
									<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Extension icon displayed, click image to open file.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

								<?php 
}
else {
?>
									<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Thumbnail displayed, click image for full size.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

								<?php 
}?>

								</span>
							<?php 
}?>


						<?php 
}?>

						<?php if ((isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null) == '' && (isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) != '' && ( (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'jpg' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'gif' || (isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'png' )) {
?>
							<br />
							<?php if ((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) == 'removed') {
?>
								<div class="nothumb">
									<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<br />Removed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

								</div>
							<?php 
}
else {
?>
								<a 
								<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
									target="_blank" 
								<?php 
}?>

								href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
								<span id="thumb<?php echo $this->scope["post"]["id"];?>"><img src="<?php echo $this->scope["file_path"];?>/thumb/<?php echo $this->scope["post"]["file"];?>s.<?php echo $this->scope["post"]["file_type"];?>" alt="<?php echo $this->scope["post"]["id"];?>" class="thumb" height="<?php echo $this->scope["post"]["thumb_h"];?>" width="<?php echo $this->scope["post"]["thumb_w"];?>" /></span>
								</a>
							<?php 
}?>

						<?php 
}
elseif ((isset($this->scope["post"]["nonstandard_file"]) ? $this->scope["post"]["nonstandard_file"]:null) != '') {
?>
							<br />
							<?php if ((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null) == 'removed') {
?>
								<div class="nothumb">
									<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>File<br />Removed<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

								</div>
							<?php 
}
else {
?>
								<a 
								<?php if ((defined("KU_NEWWINDOW") ? KU_NEWWINDOW : null)) {
?>
									target="_blank" 
								<?php 
}?>

								href="<?php echo $this->scope["file_path"];?>/src/<?php echo $this->scope["post"]["file"];?>.<?php echo $this->scope["post"]["file_type"];?>">
								<span id="thumb<?php echo $this->scope["post"]["id"];?>"><img src="<?php echo $this->scope["post"]["nonstandard_file"];?>" alt="<?php echo $this->scope["post"]["id"];?>" class="thumb" height="<?php echo $this->scope["post"]["thumb_h"];?>" width="<?php echo $this->scope["post"]["thumb_w"];?>" /></span>
								</a>
							<?php 
}?>

						<?php 
}?>


		<?php 
}?>

		<?php if ((isset($this->scope["post"]["file_type"]) ? $this->scope["post"]["file_type"]:null) == 'mp3') {
?>
			<!--[if !IE]> -->
			<object type="application/x-shockwave-flash" data="<?php echo KU_WEBPATH;?>/inc/player/player.swf?playerID=<?php echo $this->scope["post"]["id"];?>&amp;soundFile=<?php echo $this->scope["file_path"];?>/src/<?php echo urlencode(utf8_encode((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null)));?>.mp3<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["artist"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["artist"]["0"]:null) != '') {
?>&amp;artists=<?php echo $this->scope["post"]["id3"]["comments_html"]["artist"]["0"];

}
if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>&amp;titles=<?php echo urlencode(utf8_encode(html_entity_decode((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null))));

}?>&amp;wmode=transparent" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,22,87" width="290" height="24">
			<param name="wmode" value="transparent" />
			<!-- <![endif]-->
			<!--[if IE]>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,22,87" width="290" height="24">
				<param name="movie" value="<?php echo KU_WEBPATH;?>/inc/player/player.swf?playerID=<?php echo $this->scope["post"]["id"];?>&amp;soundFile=<?php echo $this->scope["file_path"];?>/src/<?php echo urlencode(utf8_encode((isset($this->scope["post"]["file"]) ? $this->scope["post"]["file"]:null)));?>.mp3<?php if ((isset($this->scope["post"]["id3"]["comments_html"]["artist"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["artist"]["0"]:null) != '') {
?>&amp;artists=<?php echo $this->scope["post"]["id3"]["comments_html"]["artist"]["0"];

}
if ((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null) != '') {
?>&amp;titles=<?php echo urlencode(utf8_encode(html_entity_decode((isset($this->scope["post"]["id3"]["comments_html"]["title"]["0"]) ? $this->scope["post"]["id3"]["comments_html"]["title"]["0"]:null))));

}?>&amp;wmode=transparent" />
				<param name="wmode" value="transparent" />
			<!-->
			</object>
			<!-- <![endif]-->
		<?php 
}?>

		<blockquote>
		<?php if ((isset($this->scope["post"]["videobox"]) ? $this->scope["post"]["videobox"]:null)) {
?>
			<?php echo $this->scope["post"]["videobox"];?>

		<?php 
}?>

		<?php echo $this->scope["post"]["message"];?>

		</blockquote>
		<?php if (! (isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) && (isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0 && ( ( (isset($this->scope["board"]["maxage"]) ? $this->scope["board"]["maxage"]:null) > 0 && ( (isset($this->scope["post"]["timestamp"]) ? $this->scope["post"]["timestamp"]:null) + ( (isset($this->scope["board"]["maxage"]) ? $this->scope["board"]["maxage"]:null) * 3600 ) ) < ( time() + 7200 ) ) || ( (isset($this->scope["post"]["deleted_timestamp"]) ? $this->scope["post"]["deleted_timestamp"]:null) > 0 && (isset($this->scope["post"]["deleted_timestamp"]) ? $this->scope["post"]["deleted_timestamp"]:null) <= ( time() + 7200 ) ) )) {
?>
			<span class="oldpost">
				<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Marked for deletion (old)<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

			</span>
			<br />
		<?php 
}?>

		<?php if ((isset($this->scope["post"]["parentid"]) ? $this->scope["post"]["parentid"]:null) == 0) {
?>
			<div id="replies<?php echo $this->scope["post"]["id"];
echo $this->scope["board"]["name"];?>">
			<?php if ((isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null)) {
?>
				<span class="omittedposts">
					<?php if ((isset($this->scope["post"]["stickied"]) ? $this->scope["post"]["stickied"]:null) == 0) {
?>
						<?php echo $this->scope["post"]["replies"];?> 
						<?php if ((isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) == 1) {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Post<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}
else {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}?>

					<?php 
}
else {
?>
						<?php echo $this->scope["post"]["replies"];?>

						<?php if ((isset($this->scope["post"]["replies"]) ? $this->scope["post"]["replies"]:null) == 1) {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Post<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}
else {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Posts<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}?>

					<?php 
}?>

					<?php if ((isset($this->scope["post"]["images"]) ? $this->scope["post"]["images"]:null) > 0) {
?>
						<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>and<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> <?php echo $this->scope["post"]["images"];?>

						<?php if ((isset($this->scope["post"]["images"]) ? $this->scope["post"]["images"]:null) == 1) {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Image<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}
else {
?>
							<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array('lower' => "yes",); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Images<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?> 
						<?php 
}?>

					<?php 
}?>

					<?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>omitted<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>. <?php  if (!isset($_tag_stack)){ $_tag_stack = array(); } $_tag_stack[] = array(); $_block_repeat=true; smarty_block_t($_tag_stack[count($_tag_stack)-1], null, $this, $_block_repeat); while ($_block_repeat) { ob_start();?>Click Reply to view.<?php  $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t($_tag_stack[count($_tag_stack)-1], $_block_content, $this, $_block_repeat); } array_pop($_tag_stack);?>

					</span>
				<?php 
}?>

			<?php 
}
else {
?>
				</td>
			</tr>
		</tbody>
		</table>
		
		<?php 
}?>

	<?php 
/* -- foreach end output */
	}
}?>

			</div>
			</div>
		<br clear="left" />
		<hr />
<?php 
/* -- foreach end output */
		$_fh1_glob["iteration"]+=1;
	}
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>