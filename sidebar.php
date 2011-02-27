<div id="right_col">

    <div id="sidebar-primary">
	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary')): ?>
		<?php endif; ?>
	</ul>
	</div>

	<div id="sidebar-secondary">
	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-secondary')): ?>
		<?php endif; ?>
	</ul>
	</div>
	
	<?php wp_meta(); ?>
	
</div> <!-- right_col -->