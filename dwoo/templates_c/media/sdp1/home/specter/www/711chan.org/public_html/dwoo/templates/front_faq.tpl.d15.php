<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'front_header.tpl', null, null, null, '_root', null);?>


<?php 
$_fh0_data = (isset($this->scope["faq"]) ? $this->scope["faq"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['faq'])
	{
/* -- foreach start output */
?>
	<div class="box last-faq">
		<div class="box-title"><?php echo $this->scope["faq"]["subject"];?></div>
		<div class="box-content">
			<p><?php echo $this->scope["faq"]["message"];?></p>
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