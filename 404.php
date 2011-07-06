<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
		<div id="container">

		<?php get_template_part( 'nav' ) ; // left column navigation ?>
		
	      <?php get_sidebar(); ?> 

		<div id="page_content">
			<h2><?php _e('Not Found', 'tpSunrise'); ?></h2>
			<p><?php _e('Whoops! Whatever you are looking for cannot be found.', 'tpSunrise'); ?></p>
			<p><?php _e('How about searching for what you were looking for?', 'tpSunrise') ?></p>
			<?php get_search_form(); ?>
            </div> <!-- page content -->
		</div> <!-- container -->
		
		<?php get_footer(); ?>
