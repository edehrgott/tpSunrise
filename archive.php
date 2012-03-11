<?php get_header(); ?>

<div id="wrapper1">
	<div id="wrapper2">
	    <div id="container">

	        <?php get_sidebar(); ?> 
			
			<?php get_template_part( 'nav' ); // left column navigation ?>

			<div id="page_content">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">

					<div class="contentdate">
						<h3><?php the_time('M y'); ?></h3>
						<h4><?php the_time('j'); ?></h4>
					</div>
					
					<div class="contenttitle">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title('','',0) ? the_title() : _e('Untitled Post', 'tpSunrise'); ?></a></h1>
						<p>Posted by <?php the_author(); ?> on <?php the_time( get_option('date_format') ); ?><br />
						Posted in <?php the_category(' &bull; ') ?>&nbsp;<?php the_tags(' | ' . __('Tagged With: ', 'tpSunrise'), ', ', ''); ?>
						  <?php if ( comments_open() ) { ?>
								  | <?php comments_popup_link( __('No Comments yet, please leave one', 'tpSunrise'), __('1 Comment', 'tpSunrise'), '% ' . __('Comments', 'tpSunrise'), __('Comments are closed', 'tpSunrise'));
							  } elseif (get_comments_number() > 0) { //don't show comment link if there are none & comments are off ?>
								  | <?php comments_popup_link( __('No Comments', 'tpSunrise'), __('1 Comment', 'tpSunrise'), '% ' . __('Comments', 'tpSunrise'), '', __('', 'tpSunrise'));	
							  } ?></p>											
					</div>
					
					<div class="post-content">
					  
					  <?php if ( 'gallery' == get_post_format( get_the_ID() ) ) : 
						    $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
						    if ( $images ) :
							    $total_images = count( $images );
							    $image = array_shift( $images );
							    $image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
						    ?>

						    <figure class="gallery-thumb">
							    <a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						    </figure><!-- .gallery-thumb -->

						    <p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s image</a>.', 'This gallery contains <a %1$s>%2$s images</a>.', $total_images, 'tpSunrise' ),
								    'href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'tpSunrise' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								    number_format_i18n( $total_images )
							    ); ?></em></p>
						    <?php endif; ?>

				      <?php endif; ?>					  
					  
					<?php the_content(__('Read more', 'tpSunrise')); ?>
					</div>
						
					<div class="postspace">
					</div>
						
					<!-- <?php trackback_rdf(); ?> -->
					<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page %'); ?>
				      <?php edit_post_link( __('Edit', 'tpSunrise'), '<p>', '</p>' ); ?> 					
				</div>	
				<?php endwhile; else: ?>
					
				<p><?php _e('Sorry, no posts matched your criteria.', 'tpSunrise'); ?></p><?php endif; ?>
				<div class="pagenav">
					<p><?php posts_nav_link(); ?></p>
				</div>
					
             </div> <!-- page content -->
		</div> <!-- container -->
		
		<?php get_footer(); ?>