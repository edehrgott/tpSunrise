<?php get_header(); ?>

<div id="wrapper1">
	<div id="wrapper2">
	    <div id="container">
		
	        <?php get_sidebar(); ?> 
			
			<?php get_template_part( 'nav' ) ; // left column navigation ?>

			<div id="page_content">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">

					<div class="contentdate">
						<h3><?php the_time('M y'); ?></h3>
						<h4><?php the_time('j'); ?></h4>
					</div>
						
					<div class="contenttitle">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						<p>By <?php the_author(); ?><br />
						<?php _e('Filed Under', 'tpSunrise'); ?>
						<?php the_category(', ') ?>&nbsp;<?php the_tags(__('| Tagged With: ', 'tpSunrise'), ', ', ''); ?> | <?php edit_post_link('(Edit Post)', '', ''); ?> | <?php comments_popup_link(__('No Comments', 'tpSunrise') . '&#187;', __('1 Comment', 'tpSunrise') . '&#187', '% ' . __('Comments', 'tpSunrise') . '&#187'); ?></p>
					</div>
					
					<div class="post-content">
					<?php the_content(__('Read more', 'tpSunrise')); ?>
					</div>
					
					<div class="postspace">
						
						<?php trackback_rdf(); ?>
					
						<?php endwhile; else: ?>
						
						<p><?php _e('Sorry, no posts matched your criteria.', 'tpSunrise'); ?></p><?php endif; ?>
						
						<div class="pagenav">
							<p><?php posts_nav_link(); ?></p>
						</div>
                    						
					</div>
					
					<?php wp_link_pages();?>
				</div>
				
				<h1>Comments</h1>
				<?php comments_template(); // Get wp-comments.php template ?>
						
            </div> <!-- page content -->
		</div> <!-- container -->
		
    <?php get_footer(); ?>
	
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

</body>
</html>