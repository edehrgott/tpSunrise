<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

	        <?php get_sidebar(); ?> 

			<div id="page_content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="contentdate">
				<h3><?php the_time('M'); ?></h3>
				<h4><?php the_time('j'); ?></h4>
			</div>
			
			<div class="contenttitle">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<p>Filed Under <?php the_category(', ') ?> | <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
				</div>
				<?php the_content(__('Read more'));?>
				
				<div class="postspace">
				</div>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
				<?php endwhile; else: ?>
				
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				<p><?php posts_nav_link(' &#8212; ', __('&larr; Previous Page'), __('Next Page &rarr;')); ?></p>
			</div>
	
            </div> <!-- page content -->
		</div> <!-- container -->
    <?php get_footer(); ?>
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

</body>
</html>