<div id="comments">
<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tpSunrise' ); ?></p>
</div><!-- #comments -->
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
	<h4 class="numcomments">
		<?php comments_number(__('No Comments', 'tpSunrise'), __('1 Comment', 'tpSunrise'), '% ' . __('Comments', 'tpSunrise')); ?>
	</h4>
	
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
	
	<div class="pagenav">
		<?php paginate_comments_links(); ?>
	</div>
    
    <div class="pagenav">
        <div class="alignleft">
            <?php previous_comments_link(); ?>
        </div>
        <div class="alignright">
            <?php next_comments_link(); ?>
        </div>
        <br/>
    </div>
    
    <?php if (!( comments_open() )) { 
          _e(' Comments are closed', 'tpSunrise'); // only show commenta are closed if there are comments and comments are closed
     } ?>    

<?php endif; ?>
      
<?php if ( comments_open() ): // If comments are open display the comment form. ?>
	<?php comment_form(); ?>
<?php endif; ?>

</div>
