<div id="right_col">

    <div id="sidebar-primary">
	  <ul>
	  <?php
	  if ( is_active_sidebar( 'sidebar-primary' ) ) : dynamic_sidebar( 'sidebar-primary' );
	  else : //no primary sidebar so call a few widgets ?>
		<li id="search" class="widget-container widget_search">
		    <?php get_search_form(); ?>
		</li>		
		    <?php wp_list_categories(array(
			  'orderby' => 'name', 
			  'order' => 'ASC', 
			  'show_count' => 0, 
			  'title_li' => '<h3 class="widget-title">' . __('Categories') . '</h3>', // standard tpSunrise sidebar title
		    )); ?>	
		<li id="archives" class="widget-container">
		    <h3 class="widget-title"><?php _e( 'Archives', 'tpSunrise' ); ?></h3>
		    <ul>
			  <?php wp_get_archives( 'type=monthly' ); ?>
		    </ul>
		</li>
	  <?php endif; ?>
	  </ul>
	</div>

    <div id="sidebar-secondary">
	  <ul>
	  <?php
	  if ( is_active_sidebar( 'sidebar-secondary' ) ) : dynamic_sidebar( 'sidebar-secondary' );
	  // no default widgets for secondary
	  endif; ?>
	  </ul>
    </div>
    
    <?php wp_meta(); ?>
	
</div> <!-- right_col -->
