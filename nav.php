<div id="left_col">

    <div id="nav">
	<?php
	if( (is_front_page()) ) {  // for home page only 
	    get_template_part( 'nav_background_alt'); // remove background color using jQuery
	}
	?>

    <?php
	// the primary WP 3 menu is vertical at the top of the left sidebar
	wp_nav_menu(array('menu_class' => 'sf-menu sf-vertical' ));
	?>
	</div>
</div> <!--left_col-->