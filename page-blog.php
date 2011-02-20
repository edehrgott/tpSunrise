<?php
/*
Template Name: Blog
*/
?>


<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="contentdate">
		<h3><?php the_time('M'); ?></h3>
		<h4><?php the_time('j'); ?></h4>
	</div>
		
	<div class="contenttitle">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<p>Filed Under <?php the_category(', ') ?>&nbsp;<?php edit_post_link('(Edit Post)', '', ''); ?></p>
		</div>
		<?php the_content(__('Read more'));?>
		<!--
		<?php trackback_rdf(); ?>
		-->
	
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	
		<h1>Comments</h1>
		<?php comments_template(); // Get wp-comments.php template ?>
	</div>
	
<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>