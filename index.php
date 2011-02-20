<?php get_header(); ?>

<div id="wrapper1">
<div id="wrapper2">
	    <div id="container">

	        <?php get_sidebar(); ?> 
			
			<?php include('nav.php'); // left column navigation ?>

			<div id="page_content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                <div class="contentdate">
                    <h3><?php the_time('M'); ?></h3>
                    <h4><?php the_time('j'); ?></h4>
                </div>
                        
                <div class="contenttitle">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    <p>By <?php the_author(); ?> Filed Under <?php the_category(', ') ?>&nbsp;<?php edit_post_link('(Edit Post)', '', ''); ?> <strong>|</strong> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    </div>
                    <?php the_content(__('Read more'));?>
                    <?php trackback_rdf(); ?>
                    
                    <?php endwhile; else: ?>
                        
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
                    
		            <?php comments_template(); // Get wp-comments.php template ?>

                </div>  
				
            </div> <!-- page content -->
		</div> <!-- container -->
    <?php get_footer(); ?>
	</div> <!-- wrapper2 -->  
</div> <!-- wrapper1 -->

</body>
</html>
