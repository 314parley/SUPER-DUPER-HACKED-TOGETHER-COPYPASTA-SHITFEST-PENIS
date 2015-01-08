<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
if (function_exists('Dwoo_Plugin_date_format')===false)
	$this->getLoader()->loadPlugin('date_format');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'front_header.tpl', null, null, null, '_root', null);?>


<?php 
$_fh0_data = (isset($this->scope["news"]) ? $this->scope["news"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['new'])
	{
/* -- foreach start output */
?>
	<div class="box last-new">
		<div class="box-title"><?php echo $this->scope["new"]["subject"];?> - <?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["new"]["timestamp"]) ? $this->scope["new"]["timestamp"]:null), "%m/%d/%Y @ %H:%M:%S", null);?> - by <?php echo $this->scope["new"]["poster"];?></div>
		<div class="box-content">
			<p><?php echo $this->scope["new"]["message"];?></p>
		</div>
	</div>
<?php 
/* -- foreach end output */
	}
}?>


<?php echo Dwoo_Plugin_include($this, 'front_footer.tpl', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>