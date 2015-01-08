<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
if (function_exists('Dwoo_Plugin_date_format')===false)
	$this->getLoader()->loadPlugin('date_format');
if (function_exists('Dwoo_Plugin_truncate')===false)
	$this->getLoader()->loadPlugin('truncate');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'front_header.tpl', null, null, null, '_root', null);?>


<div class="box boards">
	<div class="box-title">Boards</div>
	<div class="box-content">
		<?php 
$_fh1_data = (isset($this->scope["sections"]) ? $this->scope["sections"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['section'])
	{
/* -- foreach start output */
?>
			<ul>
				<?php echo $this->scope["section"]["name"];?>

				<?php 
$_fh0_data = (isset($this->scope["boards"]) ? $this->scope["boards"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['board'])
	{
/* -- foreach start output */
?>
					<?php if ((isset($this->scope["section"]["id"]) ? $this->scope["section"]["id"]:null) == (isset($this->scope["board"]["section"]) ? $this->scope["board"]["section"]:null)) {
?>
						<li>
							<a href="<?php echo $this->scope["board"]["name"];?>/">/<?php echo $this->scope["board"]["name"];?>/ - <?php echo $this->scope["board"]["desc"];?></a>
						</li>
					<?php 
}?>

				<?php 
/* -- foreach end output */
	}
}?> 
			</ul>
		<?php 
/* -- foreach end output */
	}
}?>

		<div class="clear"></div>
	</div>
</div>

<div class="box last-new">
	<div class="box-title"><?php echo $this->scope["last_new"]["0"]["subject"];?> - <?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["last_new"]["0"]["timestamp"]) ? $this->scope["last_new"]["0"]["timestamp"]:null), "%m/%d/%Y @ %H:%M:%S", null);?> - by <?php echo $this->scope["last_new"]["0"]["poster"];?></div>
	<div class="box-content">
		<p><?php echo $this->scope["last_new"]["0"]["message"];?></p>
	</div>
</div>

<div class="box last-images">
	<div class="box-title">Recent Images</div>
	<div class="box-content">
		<ul>
			<?php 
$_fh2_data = (isset($this->scope["last_images"]) ? $this->scope["last_images"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['last_image'])
	{
/* -- foreach start output */
?>
				<li>
					<a href="<?php echo $this->scope["last_image"]["board"];?>/res/<?php echo $this->scope["last_image"]["parentid"];?>.html#<?php echo $this->scope["last_image"]["id"];?>">
						<img src="<?php echo $this->scope["last_image"]["board"];?>/thumb/<?php echo $this->scope["last_image"]["file"];?>s.<?php echo $this->scope["last_image"]["file_type"];?>" alt="" />
					</a>
				</li>
			<?php 
/* -- foreach end output */
	}
}?>

		</ul>
	</div>
</div>

<div class="box last-post">
	<div class="box-title">Recent Posts</div>
	<div class="box-content">
		<ul>
			<?php 
$_fh3_data = (isset($this->scope["last_posts"]) ? $this->scope["last_posts"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['last_post'])
	{
/* -- foreach start output */
?>
				<li>
					<?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["last_post"]["timestamp"]) ? $this->scope["last_post"]["timestamp"]:null), "%m/%d @ %H:%M", null);?> - 
					<a href="<?php echo $this->scope["last_post"]["board"];?>/res/<?php echo $this->scope["last_post"]["parentid"];?>.html#<?php echo $this->scope["last_post"]["id"];?>">>>/<?php echo $this->scope["last_post"]["board"];?>/<?php echo $this->scope["last_post"]["id"];?></a> -
					<?php echo Dwoo_Plugin_truncate($this, preg_replace('#<[^>]*>#', ' ', (isset($this->scope["last_post"]["message"]) ? $this->scope["last_post"]["message"]:null)), 40, '...', false, false);?>

				</li>	
			<?php 
/* -- foreach end output */
	}
}?>

		</ul>
	</div>
</div>

<div class="box popular-thread">
	<div class="box-title">Popular Threads</div>
	<div class="box-content">
		<ul>
			<?php 
$_fh4_data = (isset($this->scope["popular_threads"]) ? $this->scope["popular_threads"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['popular_thread'])
	{
/* -- foreach start output */
?>
				<li>
					<?php echo Dwoo_Plugin_date_format($this, (isset($this->scope["popular_thread"]["timestamp"]) ? $this->scope["popular_thread"]["timestamp"]:null), "%m/%d @ %H:%M", null);?> - 
					/<?php echo $this->scope["popular_thread"]["board"];?>/ -
					<a href="<?php echo $this->scope["popular_thread"]["board"];?>/res/<?php echo $this->scope["popular_thread"]["parentid"];?>.html#<?php echo $this->scope["popular_thread"]["id"];?>">#<?php echo $this->scope["popular_thread"]["id"];?></a> -
					<?php echo Dwoo_Plugin_truncate($this, preg_replace('#<[^>]*>#', ' ', (isset($this->scope["popular_thread"]["message"]) ? $this->scope["popular_thread"]["message"]:null)), 40, '...', false, false);?>

				</li>	
			<?php 
/* -- foreach end output */
	}
}?>		
	</div>
</div>	

<div class="box popular-thread">
	<div class="box-title">Statistics</div>
	<div class="box-content">
		<ul>
			<li>Active Posts: <?php echo $this->scope["postcount"];?></li>
			<li>Active Images: <?php echo $this->scope["imagecount"]["0"]["imagecount"];?></li>
			<li>Disk Usage: <?php echo (sprintf('%.2f', (isset($this->scope["imagecount"]["0"]["imagesize"]) ? $this->scope["imagecount"]["0"]["imagesize"]:null) / 1000 / 1000 / 1000));?> GB</li>
			<li>Active Shitposters: yet to be calculated</li>
	</div>
</div>

<?php echo Dwoo_Plugin_include($this, 'front_footer.tpl', null, null, null, '_root', null);?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>