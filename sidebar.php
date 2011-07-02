<div id="right_col">

    <div id="sidebar-primary">
	  <ul>
	  <?php
	  if ( is_active_sidebar( 'sidebar-primary' ) ) : dynamic_sidebar( 'sidebar-primary' );
	  else : //no primary sidebar so call a few widgets 
		  the_widget('WP_Widget_Search');
		  the_widget('WP_Widget_Categories');
		  the_widget('WP_Widget_Archives');
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
