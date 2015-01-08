<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'front_header.tpl', null, null, null, '_root', null);?>


<div class="box last-new">
	<div class="box-title">Rules</div>
	<div class="box-content">
		<ul>
			<?php 
$_fh0_data = (isset($this->scope["rules"]) ? $this->scope["rules"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['rule'])
	{
/* -- foreach start output */
?>
				<li><?php echo $this->scope["rule"]["message"];?></li>
			<?php 
/* -- foreach end output */
	}
}?>

		</ul>
	</div>
</div>

<?php echo Dwoo_Plugin_include($this, 'front_footer.tpl', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>