			<div id="pswd_comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tpSunrise' ); ?></p>
			</div><!-- #pswd_comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if (have_comments()): ?>
	<h4 id="comments">
		<?php comments_number('No Comments', 'One Comment', '% Comments' );?>
	</h4>
	
	<div class="pagenav">
		<div class="alignleft">
			<?php previous_comments_link() ?>
		</div>
		<div class="alignright">
			<?php next_comments_link() ?>
		</div>
		<br/>
	</div>
	
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
	<div class="pagenav">
		<?php paginate_comments_links(); ?>
	</div>
<?php else: // this is displayed if there are no comments so far ?>

	<?php if (comments_open()): // If comments are open, but there are no comments. ?>
	
	<?php else: // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
	
<?php endif; ?>
	

<?php comment_form(); ?> 


</div>


