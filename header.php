<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<title>
<?php if (function_exists('is_tag') && is_tag()) {
single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
} elseif (is_archive()) {
wp_title(''); echo ' Archive - ';
} elseif (is_search()) {
echo 'Search for &quot;'.esc_html($s).'&quot; - ';
} elseif (!(is_404()) && (is_single()) || (is_page())) {
wp_title(''); echo ' - ';
} elseif (is_404()) {
echo 'Not Found - ';
}
if (is_home()) {
bloginfo('name'); echo ' - '; bloginfo('description');
} else {
bloginfo('name');
}
if ($paged > 1) {
echo ' - page '. $paged;
} ?>
</title>
<?php if(is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
<?php }?>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_enqueue_script('superfish-init', get_template_directory_uri() . '/js/superfish-init.js');

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

<div id="masthead">

	<?php if ($options['use_alt_header']) {  //we're using alternate images for all but home page
		    if( (is_front_page()) ) {  // for home and sub page headers ?>
			    <!-- home_logo -->
			    <img id="headerimg" src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header image alt text" />
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
		    <img id="headerimg" src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header image alt text" />
		    <div id="header_text">
		    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		    <h2 class="description"><?php bloginfo( 'description' ); ?></h2>
		    </div> 
	<?php }?>
</div>

