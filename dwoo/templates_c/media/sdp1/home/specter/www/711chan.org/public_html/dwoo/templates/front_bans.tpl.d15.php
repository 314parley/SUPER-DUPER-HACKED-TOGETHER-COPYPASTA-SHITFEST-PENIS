<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
if (function_exists('Dwoo_Plugin_date_format')===false)
	$this->getLoader()->loadPlugin('date_format');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'front_header.tpl', null, null, null, '_root', null);?>


<table border="1">
	<thead>
		<th>IP</th>
		<th>Reason</th>
		<th>Boards</th>
		<th>Created</th>
		<th>Expires</th>
		<th>Staff Member</th>
	</thead>
	<tbody>
		<?php 
$_fh0_data = (isset($this->scope["bans"]) ? $this->scope["bans"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['ban'])
	{
/* -- foreach start output */
?>
			<tr <?php if ((isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:null) == md5_decrypt((isset($this->scope["ban"]["ip"]) ? $this->scope["ban"]["ip"]:null), (isset($this->scope["seed"]) ? $this->scope["seed"] : null))) {
?> style="background: #FFE4E1"<?php 
}?>>
				<td><?php echo mb_strimwidth(md5_decrypt((isset($this->scope["ban"]["ip"]) ? $this->scope["ban"]["ip"]:null), (isset($this->scope["seed"]) ? $this->scope["seed"] : null)), 7, 9, "x.x");?></td>
				<td><?php echo $this->scope["ban"]["reason"];?></td>
				<td><?php if ((isset($this->scope["ban"]["boards"]) ? $this->scope["ban"]["boards"]:null) == '') {
?>All<?php 
}
else {

echo str_replace("|", " / ", (isset($this->scope["ban"]["boards"]) ? $this->scope["ban"]["boards"]:null));

}?></td>
				<td nowrap><?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["ban"]["at"]) ? $this->scope["ban"]["at"]:null), "%d/%m @ %H:%M:%S", null);?></td>
				<td nowrap><?php if ((isset($this->scope["ban"]["until"]) ? $this->scope["ban"]["until"]:null) == 0) {
?>Never<?php 
}
else {

echo Dwoo_Plugin_date_format($this, (isset($this->scope["ban"]["until"]) ? $this->scope["ban"]["until"]:null), "%d/%m @ %H:%M:%S", null);

}?></td>
				<td><?php echo $this->scope["ban"]["by"];?></td>
			</tr>
		<?php 
/* -- foreach end output */
	}
}?>

	</tbody>
</table>

<?php echo Dwoo_Plugin_include($this, 'front_footer.tpl', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>