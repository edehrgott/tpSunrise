<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

			<?php include('nav.php'); // left column navigation ?>
		
	        <?php get_sidebar(); ?> 

			<div id="page_content">
            <div id="contentmiddle">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
	                <?php the_content(__('Read more'));?>
	                <!-- <?php trackback_rdf(); ?> -->
	            <?php endwhile; else: ?>
	                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	         </div>

            </div> <!-- page content -->
		</div> <!-- container -->
    <?php get_footer(); ?>
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

<!-- The main column ends  -->

