{include(file='front_header.tpl')}

<div class="box boards">
	<div class="box-title">Boards</div>
	<div class="box-content">
		{foreach $sections section}
			<ul>
				{$section.name}
				{foreach $boards board}
					{if $section.id eq $board.section}
						<li>
							<a href="{$board.name}/">/{$board.name}/ - {$board.desc}</a>
						</li>
					{/if}
				{/foreach} 
			</ul>
		{/foreach}
		<div class="clear"></div>
	</div>
</div>

<div class="box last-new">
	<div class="box-title">{$last_new.0.subject} - {date_format $last_new.0.timestamp "%m/%d/%Y @ %H:%M:%S"} - by {$last_new.0.poster}</div>
	<div class="box-content">
		<p>{$last_new.0.message}</p>
	</div>
</div>

<div class="box last-images">
	<div class="box-title">Recent Images</div>
	<div class="box-content">
		<ul>
			{foreach $last_images last_image}
				<li>
					<a href="{$last_image.board}/res/{$last_image.parentid}.html#{$last_image.id}">
						<img src="{$last_image.board}/thumb/{$last_image.file}s.{$last_image.file_type}" alt="" />
					</a>
				</li>
			{/foreach}
		</ul>
	</div>
</div>

<div class="box last-post">
	<div class="box-title">Recent Posts</div>
	<div class="box-content">
		<ul>
			{foreach $last_posts last_post}
				<li>
					{date_format $last_post.timestamp "%m/%d @ %H:%M"} - 
					<a href="{$last_post.board}/res/{$last_post.parentid}.html#{$last_post.id}">>>/{$last_post.board}/{$last_post.id}</a> -
					{truncate strip_tags($last_post.message) 40}
				</li>	
			{/foreach}
		</ul>
	</div>
</div>

<div class="box popular-thread">
	<div class="box-title">Popular Threads</div>
	<div class="box-content">
		<ul>
			{foreach $popular_threads popular_thread}
				<li>
					{date_format $popular_thread.timestamp "%m/%d @ %H:%M"} - 
					/{$popular_thread.board}/ -
					<a href="{$popular_thread.board}/res/{$popular_thread.parentid}.html#{$popular_thread.id}">#{$popular_thread.id}</a> -
					{truncate strip_tags($popular_thread.message) 40}
				</li>	
			{/foreach}		
	</div>
</div>	

<div class="box popular-thread">
	<div class="box-title">Statistics</div>
	<div class="box-content">
		<ul>
			<li>Active Posts: {$postcount}</li>
			<li>Active Images: {$imagecount.0.imagecount}</li>
			<li>Disk Usage: {math "$imagecount.0.imagesize / 1000 / 1000 / 1000" %.2f} GB</li>
			<li>Active Shitposters: yet to be calculated</li>
	</div>
</div>

{include(file='front_footer.tpl')}
