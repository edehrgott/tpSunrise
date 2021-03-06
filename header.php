<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<title>
<?php
if (is_front_page()) {
bloginfo('description'); echo ' - '; bloginfo('name');
} else {
	if (function_exists('is_tag') && is_tag()) {
	single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
	} elseif (is_archive()) {
	wp_title(''); echo ' Archive - ';
	} elseif (is_search()) {
	echo 'Search for &quot;'.esc_html($s).'&quot; - ';
	} elseif ( !(is_404()) && (is_single()) || (is_page())) {
	wp_title(''); echo ' - ';
	} elseif (is_404()) {
	echo 'Not Found - ';
	} 
	bloginfo('name');
}
if ($paged > 1) {
echo ' - page '. $paged;
} ?>
</title>
<?php if(is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_enqueue_style( 'tpSunrise_custom', get_template_directory_uri() . '/custom.css' ); ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

$options = get_option('tpSunrise_options');
if ( 'blank' == get_header_textcolor() ) { ?>
	  <style type="text/css">
	  #header_text h1 a {display: none;}
	  #header_text .description {display: none;}
	  </style>
<?php } else { ?>  
	  <style type="text/css">
	  #header_text h1 a {color: #<?php echo get_header_textcolor() ?>;}
	  #header_text .description {color: #<?php echo get_header_textcolor() ?>;}
	  </style>
<?php }

// get alternate styling for home page
if( (is_front_page()) ) {  // for home page only
	  if ($options['use_alt_home_style']) { ?>
		    <!-- alternate home page styling -->
		    <style type="text/css">
		    <?php echo $options['alt_home_style_text']; ?>
		    </style>

	  <?php }
}
	
wp_head(); ?>
   
</head>

<body <?php body_class(); ?>>

	<?php if ($options['use_alt_header']) {  //we're using alternate images for all but home page
		    if( (is_front_page()) ) {  // for home and sub page headers ?>
			    <!-- home_logo -->
			    <?php $header_image = get_header_image();
				if ( $header_image ) {
				// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						$header_image_width  = get_custom_header()->width;
						$header_image_height = get_custom_header()->height;
					} else {
						$header_image_width  = HEADER_IMAGE_WIDTH;
						$header_image_height = HEADER_IMAGE_HEIGHT;
					} ?>
					<img id="headerimg"src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php } ?>
			    <div id="header_text">
			    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			    <h2 class="description"><?php bloginfo( 'description' ); ?></h2>
			    </div>
		    <?php	
		    } else { ?>
			    <!-- sub_logo -->
			    <img alt="Sub Logo" src="<?php echo $options['alt_header_location'] ?>" style="border-width: 0px;" />
			    <h1><a style="color:<?php echo $options['textcolor']?>;" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		    <?php }
	}else { // same image for all pages ?>
		    <!-- <img id="headerimg" src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header image alt text" /> -->
			<!-- home_logo -->
			<?php $header_image = get_header_image();
			 if ( $header_image ) {
				echo '<div id="masthead">';
				// Compatibility with versions of WordPress prior to 3.4.
				 if ( function_exists( 'get_custom_header' ) ) {
					 $header_image_width  = get_custom_header()->width;
					 $header_image_height = get_custom_header()->height;
				 } else {
					 $header_image_width  = HEADER_IMAGE_WIDTH;
					 $header_image_height = HEADER_IMAGE_HEIGHT;
				 } ?>
				 <img id="headerimg"src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
			 <?php } else {
				echo '<div id="noheader_masthead">';
			 } ?>
		    <div id="header_text">
		    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		    <h2 class="description"><?php bloginfo( 'description' ); ?></h2>
		    </div> 
	<?php } ?>
</div>

