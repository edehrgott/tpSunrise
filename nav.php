<div id="left_col">

    <div id="nav">
    <?php
	// the primary WP 3 menu is vertical at the top of the left sidebar
	wp_nav_menu(array('menu_class' => 'sf-menu sf-vertical' , 'theme_location' => 'primary'));
	?>
	</div>
    
   <div id="sidebar-left">
	  <ul>
	  <?php
	  if ( is_active_sidebar( 'sidebar-left' ) ) : dynamic_sidebar( 'sidebar-left' );
	  // no default widgets
	  endif; ?>
	  </ul>
	</div>    
</div> <!--left_col-->