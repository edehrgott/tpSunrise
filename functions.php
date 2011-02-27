<?php
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Sidebar Primary',
		'id' => 'sidebar-primary',
		'description' => 'sidebar primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => 'Sidebar Secondary',
		'id' => 'sidebar-secondary',
		'description' => 'sidebar secondary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
wp_enqueue_script('jquery');

// navigation menu
if (function_exists('register_nav_menu')) {
    register_nav_menu('primary', __('Menu'));
}

add_theme_support('automatic-feed-links');

if ( ! isset( $content_width ) ) $content_width = 700;

add_filter('gallery_style', create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));

?>