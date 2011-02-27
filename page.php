<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

			<?php get_template_part( 'nav' ) ; // left column navigation ?>
		
	        <?php get_sidebar(); ?> 

			<div id="page_content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
	                <?php the_content(__('Read more', 'tpSunrise'));?>
	                <!-- <?php trackback_rdf(); ?> -->
	            <?php endwhile; else: ?>
	            <p><?php _e('Sorry, no posts matched your criteria.', 'tpSunrise'); ?></p><?php endif; ?>
				
		        <?php if (comments_open()) comments_template(); // Get wp-comments.php template ?>

            </div> <!-- page content -->
		</div> <!-- container -->
    <?php get_footer(); ?>
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

</body>
</html>