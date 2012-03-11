<?php get_header(); ?>

<div id="wrapper1">
	<div id="wrapper2">
	    <div id="container">
		
	        <?php get_sidebar(); ?> 
			
			<?php get_template_part( 'nav' ) ; // left column navigation ?>

			<div id="page_content"> <!--single-->
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">
				
					<div class="contentdate">
						<h3><?php the_time('M y'); ?></h3>
						<h4><?php the_time('j'); ?></h4>
					</div>
						
					<div class="contenttitle">
						<?php echo "<h1>Go back to <a href='" . get_permalink($post->post_parent). "'>" . get_the_title($post->post_parent) ."</a></h1>"; ?>
						<p>Posted by <?php the_author(); ?> on <?php the_time( get_option('date_format') ); ?><br />
						Posted in <?php the_category(' &bull; ') ?>&nbsp;<?php the_tags(' | ' . __('Tagged With: ', 'tpSunrise'), ', ', ''); ?>
						  <?php if ( comments_open() ) { ?>
								  | <?php comments_popup_link( __('No Comments yet, please leave one', 'tpSunrise'), __('1 Comment', 'tpSunrise'), '% ' . __('Comments', 'tpSunrise'), __('Comments are closed', 'tpSunrise'));
							  } elseif (get_comments_number() > 0) { //don't show comment link if there are none & comments are off ?>
								  | <?php comments_popup_link( __('No Comments', 'tpSunrise'), __('1 Comment', 'tpSunrise'), '% ' . __('Comments', 'tpSunrise'), '', __('', 'tpSunrise'));	
							  } ?></p>									
					</div>
										
					<div class="post-content">
						<p><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?>
						<?php the_content(__('Read more', 'tpSunrise')); ?>
						</p>
					</div>
					
					<div class="alignleft gallery-image-link"><?php previous_image_link( 0, '&laquo;' ) ?></div>
					<div class="alignleft"><?php previous_image_link( array( 50, 50 )) ?></div>
				    
					<div class="alignright gallery-image-link"><?php next_image_link( 0, '&raquo;' ) ?></div>
					<div class="alignright"><?php next_image_link( array( 50, 50 )) ?></div>
					
					<div class="postspace">
						
						<?php trackback_rdf(); ?>

						<?php endwhile; else: ?>
						
						<p><?php _e('Sorry, no posts matched your criteria.', 'tpSunrise'); ?></p><?php endif; ?>
                        
					</div>
					
                    <div class="page-link">
                        <?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page %'); ?>
                    </div>

                    <div class="edit-link">
                        <?php edit_post_link( __('Edit', 'tpSunrise'), '<p>', '</p>' ); ?> 
                    </div>                    
                    
				</div>
				
				<?php comments_template(); // Get wp-comments.php template ?>
						
             </div> <!-- page content -->
		</div> <!-- container -->
		
		<?php get_footer(); ?>