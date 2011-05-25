<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

			<?php get_template_part( 'nav' ) ; // left column navigation ?>
		
	        <?php get_sidebar(); ?> 

			<div id="page_content">
			<h2><?php _e('Not Found', 'tpSunrise'); ?></h2>
			<p><?php _e('Whoops! Whatever you are looking for cannot be found.', 'tpSunrise'); ?></p>
            </div> <!-- page content -->
		</div> <!-- container -->
		
    <?php get_footer(); ?>
	
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

</body>
</html>