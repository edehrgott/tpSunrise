<?php

// sidebars
add_action( 'widgets_init', 'tpSunrise_register_sidebars' );

function tpSunrise_register_sidebars() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __('Sidebar Primary', 'tpSunrise'),
		'id' => 'sidebar-primary',
		'description' => __('sidebar primary widget area', 'tpSunrise'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Area 2, below area 1
	register_sidebar( array(
		'name' => __('Sidebar Secondary', 'tpSunrise'),
		'id' => 'sidebar-secondary',
		'description' => __('sidebar secondary widget area', 'tpSunrise'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

// navigation menu
function tpSunrise_register_menus() {
	register_nav_menus(array('primary' => __('Left Column Menu', 'tpSunrise')));
}

// theme requires jQuery
wp_enqueue_script('jquery');

// nav menus use superfish
if ( !is_admin() ) { //superfish scripts aren't needed for admin area
	// register the scripts
	wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js' );
	wp_register_script('hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js' );
	// enqueue the scripts
	wp_enqueue_script('superfish');   
	wp_enqueue_script('hoverIntent');
}

add_action( 'init', 'tpSunrise_register_menus' );

add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

load_theme_textdomain( 'tpSunrise', TEMPLATEPATH . '/languages' );  //i18n

if (! isset( $content_width )) $content_width = 700;

add_custom_background();

// tpSunrise options
require_once ( get_template_directory() . '/theme-options.php' );

//Check see if the customise theme setup exists
if ( !function_exists('tpSunrise_customisetheme_setup') ):
    //Any theme customisations contained in this function
    function tpSunrise_customisetheme_setup() {
        //Define default header image
	  if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '#fffff4' );

	  // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	  if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/tpSunrise_joy.jpg' );
	  
        
        //Define the width and height of our header image
        define( 'HEADER_IMAGE_WIDTH', apply_filters( 'tpSunrise_header_image_width', 940 ) );
        define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'tpSunrise_header_image_height', 200 ) );

	  
	  // We'll be using post thumbnails for custom header images on posts and pages.
	  // We want them to be 940 pixels wide by 200 pixels tall.
	  // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	  set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );	
        
        //Don't forget this, it adds the functionality to the admin menu
        add_custom_image_header( '', 'tpSunrise_customisetheme_admin_header_style' );
        
        //Set some custom header images, add as many as you like
        //%s is a placeholder for your theme directory
        $customHeaders = array (
                //Image 1
                'joy' => array (
                'url' => '%s/images/tpSunrise_joy.jpg',
                'thumbnail_url' => '%s/images/tpSunrise_joy_thumb.jpg',
                'description' => __( 'Joy', 'tpSunrise' )
            ),
                //Image 2
                'desert' => array (
                'url' => '%s/images/tpSunrise_desert.jpg',
                'thumbnail_url' => '%s/images/tpSunrise_desert_thumb.jpg',
                'description' => __( 'Desert', 'tpSunrise' )
            ),
                //Image 3
                'sunrise' => array (
                'url' => '%s/images/tpSunrise_sunrise.jpg',
                'thumbnail_url' => '%s/images/tpSunrise_sunrise_thumb.jpg',
                'description' => __( 'Sunrise', 'tpSunrise' )
            )
        );
        //Register the images 
        register_default_headers($customHeaders);
    }
endif;

if ( ! function_exists( 'tpSunrise_customisetheme_admin_header_style' ) ) :
    //Function fired and inline styles added to the admin panel
    function tpSunrise_customisetheme_admin_header_style() {
    ?>
        <style type="text/css">
            #wpbody-content #headimg {
                height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
                width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                border: 0px;
            }
        </style>
    <?php
    }
endif;

//Execute custom theme functionality
add_action( 'after_setup_theme', 'tpSunrise_customisetheme_setup' );

// fix gallery shortcode validation error
add_filter( 'use_default_gallery_style', '__return_false' );

add_editor_style()

?>