<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<!--<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ); ?></title>-->
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
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<?php if(is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
<?php }?>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/ie7.css" type="text/css" media="screen, projection" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('gpp_feedburner_url') <> "" ) { echo get_option('gpp_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
<?php wp_head(); ?>

<!-- Conditional Javascripts -->
<!--[if IE 6]>
<script src="<?php get_template_directory_uri(); ?>/includes/js/pngfix.js"></script>	
<![endif]-->
<!-- End Conditional Javascripts -->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>

<script type="text/javascript">
// initialise superfish
jQuery(function(){
	jQuery('ul.sf-menu').superfish();
});
</script>
	
</head>

<body <?php body_class(); ?>>

<div id="masthead">
	<?php
	if( (is_front_page()) ) {  // for home and sub page headers
	    get_template_part( 'home_logo' ); // show home page logo
	} else {
	    get_template_part( 'sub_logo' ); // show sub page logo
	} ?>
</div>

