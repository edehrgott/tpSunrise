<div id="right_col">

    <div id="sidebar-primary">
	<ul>
	    <?php
	    if ( is_active_sidebar( 'sidebar-primary' ) ) : dynamic_sidebar( 'sidebar-primary' );
	    else : //no primary sidebar so calll a few widgets 
		    the_widget('WP_Widget_Search', $instance, $args);
		    the_widget('WP_Widget_Categories', $instance, $args);
		    the_widget('WP_Widget_Archives', $instance, $args);
	    endif; ?>
	</ul>
	</div>

	<div id="sidebar-secondary">
	<ul>
	    <?php
	    if ( is_active_sidebar( 'sidebar-secondary' ) ) : dynamic_sidebar( 'sidebar-secondary' );
	    // no default widgets for secondary
	    endif; ?>
	</ul>
	</div>
	
	<?php wp_meta(); ?>
	
</div> <!-- right_col -->
