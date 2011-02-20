<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

			<?php include('nav.php'); // left column navigation ?>
		
	        <?php get_sidebar(); ?> 

			<div id="page_content">
				<div id="contentmiddle">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div class="contentdate">
							<h3><?php the_time('M'); ?></h3>
							<h4><?php the_time('j'); ?></h4>
						</div>
							
						<div class="contenttitle">
							<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<p>by <?php the_author(); ?></p>
							<p>Posted in <?php the_category(', ') ?> | <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>&nbsp;<?php edit_post_link('(Edit Post)', '', ''); ?></p>
							</div>
							<?php the_content(__('Read more'));?><div style="clear:both;"></div>
						
							<!--<div class="postspace">
							</div>-->
							
							<!--
							<?php trackback_rdf(); ?>
							-->
						
							<?php endwhile; else: ?>
							
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
							<p><?php posts_nav_link(' &#8212; ', __('&larr; Previous Page'), __('Next Page &rarr;')); ?></p>
						</div>
					
				</div>
			  <!-- InstanceEndEditable -->
            </div> <!-- page content -->
		</div> <!-- container -->
		
    <?php get_footer(); ?>
	
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

<!-- The main column ends  -->

