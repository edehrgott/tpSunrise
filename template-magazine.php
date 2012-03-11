<?php
/*
Template Name: Magazine Page
*/
?>

<?php get_header(); ?>

<div id="wrapper1">
   <div id="wrapper2">
	<div id="container">
	 
	 <?php get_sidebar(); ?>
	 
	   <?php get_template_part( 'nav' ) ; // left column navigation ?>

	   <div id="page_content">
	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	   <div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">
		  <h1><?php the_title(); ?></h1>   
		  <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
		  <?php the_content(__('Read more', 'tpSunrise'));?>
		  <!-- <?php trackback_rdf(); ?> -->
		  
		  <div class="page-link">
			 <?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page %'); ?>
		  </div>
    
		  <div class="edit-link">
			 <?php edit_post_link( __('Edit', 'tpSunrise'), '<p>', '</p>' ); ?> 
		  </div>
	   </div>
	   <?php endwhile; else: ?>
	   <p><?php _e('Sorry, no posts matched your criteria.', 'tpSunrise'); ?></p><?php endif; ?>
		  
	   <?php comments_template(); // Get wp-comments.php template ?>
	   
	   	<?php if( is_front_page() ) {  // for home page only do second loop to get 4 most recent post excerpts ?>
		   <div id="recent_posts">
		   <h2>Recent Blog Posts</h2>
		   <?php $args = array( 'numberposts' => 4 );
		   global $post;
		   $recent_posts_array = get_posts( $args );
		   foreach( $recent_posts_array as $post ) : setup_postdata($post); ?>
			<li class="recent_posts_item"><a href="<?php the_permalink(); ?>" class="recent_posts_title"><?php the_title(); ?></a><br />
			<div id="recent_posts_meta">
			   <p>Posted by <?php the_author(); ?> on <?php the_time( get_option('date_format') ); ?><br />
			</div>
			<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>			
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read The Full Post</a>
		   <?php endforeach; ?>
		   </div>
		
		<?php } ?>
	   
	   </div> <!-- page content -->
         
	   </div> <!-- container -->
	   
	   <?php if( is_front_page() ) {  // for home page only - script to control clickable image resizing ?>	
		<script type="text/javascript">
		jQuery(document).ready(function() {
	     
		function imageresize() {
		   var contentwidth = jQuery('#page_content').width();
		   if ((contentwidth) < '660'){ // little window
			jQuery('#relaxmenu a').css({
			   'height': '150px',
			   'width': '475px',
			   'background': 'url(/images/body_button_sm.jpg) 0 0 no-repeat'
			});
			jQuery('#pleasuremenu a').css({
			   'height': '150px',
			   'width': '475px',
			   'background': 'url(/images/pleasure_button_sm.jpg) 0 0 no-repeat'
			});
			jQuery('#passionmenu a').css({
			   'height': '150px',
			   'width': '475px',
			   'background': 'url(/images/passion_button_sm.jpg) 0 0 no-repeat'
			});
			// handle hovers - adjust sliding windows
			jQuery('#relaxmenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -150px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});
			jQuery('#pleasuremenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -150px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});
			jQuery('#passionmenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -150px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});			
			
		   } else { // big window
			jQuery('#relaxmenu a').css({
			   'height': '200px',
			   'width': '633px',
			   'background': 'url(/images/body_button.jpg) 0 0 no-repeat'
			});
			jQuery('#pleasuremenu a').css({
			   'height': '200px',
			   'width': '633px',
			   'background': 'url(/images/pleasure_button.jpg) 0 0 no-repeat'
			});
			jQuery('#passionmenu a').css({
			   'height': '200px',
			   'width': '633px',
			   'background': 'url(/images/passion_button.jpg) 0 0 no-repeat'
			});
			// handle hovers - adjust sliding windows
			jQuery('#relaxmenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -200px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});
			jQuery('#pleasuremenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -200px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});
			jQuery('#passionmenu a').mouseenter(function(){
			   jQuery(this).css('background-position', '0px -200px');
			}).mouseleave(function(){
			   jQuery(this).css('background-position', '0 0');
			});
			
		   }
            };
		  
		imageresize(); // triggers when document first loads    
		jQuery(window).bind("resize", function(){ // when browser resized
		   imageresize();
		});
		
		});
		</script>
	   <?php } 
	   
	   get_footer(); ?>