<?php

add_action( 'admin_init', 'tpSunrise_options_init' );
add_action( 'admin_menu', 'tpSunrise_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function tpSunrise_options_init(){
	register_setting( 'tpSunrise_option_group', 'tpSunrise_options', 'tpSunrise_options_validate' );
}

/**
 * fix the edit_theme_options/manage_options bug using new WP 3.2 filter
 */
function tpSunrise_get_options_page_cap() {
    return 'edit_theme_options';
}

add_filter( 'option_page_capability_tpSunrise_options', 'tpSunrise_get_options_page_cap' );

/**
 * Load the menu page
 */
function tpSunrise_options_add_page() {
	add_theme_page( __( 'Theme Options', 'tpSunrise' ), __( 'Theme Options', 'tpSunrise' ), tpSunrise_get_options_page_cap(), 'tpSunrise_options', 'tpSunrise_options_do_page' );
}

/**
 * Create the options page
 */
function tpSunrise_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false ;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'tpSunrise' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'tpSunrise' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'tpSunrise_option_group' ); ?>
			<?php $options = get_option( 'tpSunrise_options' );

			_e( '<p>tpSunrise supports one header style for the home page and an alternate header for all other pages. To enable this feature, check the option box to use the alternate header and provide the location of the image you wish to use. The blog title will display on the alternate pages. Be sure to set the text color too.</p>', 'tpSunrise' );
			_e( '<p>Leave the box unchecked if you want to use the same header on all pages.</p>', 'tpSunrise' );
			?>
			<table class="form-table">

				<?php
				/**
				 * Use alternate header?
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Use Alternate Header', 'tpSunrise' ); ?></th>
					<td>
						<input id="tpSunrise_options[use_alt_header]" name="tpSunrise_options[use_alt_header]" type="checkbox" value="1" <?php checked( '1', $options['use_alt_header'] ); ?> />
						<label class="description" for="tpSunrise_options[use_alt_header]"><?php _e( 'Use alternate header on all pages except home page', 'tpSunrise' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Where is the alternate header?
				 */
				?>
				<tr valign="top"> <th scope="row"><?php _e( 'Alt Header Location', 'tpSunrise' ); ?></th>
					<td>
						<input id="tpSunrise_options[alt_header_location]" class="regular-text" type="text" name="tpSunrise_options[alt_header_location]" value="<?php esc_attr_e( $options['alt_header_location'] ); ?>" />
						<label class="description" for="tpSunrise_options[alt_header_location]"><?php _e( 'Location of alternate header image (samples are at <em>/wp-content//themes/tpsunrise/images/tpSunrise_alt_header_sample1.png &amp; tpSunrise_alt_header_sample2.png</em>)', 'tpSunrise' ); ?></label>
					</td>
				</tr>
                
                <?php
                /**
                 * Text color of blog name on alt pages
                 */
                ?>
                <tr valign="top"> <th scope="row"><?php _e( 'Alt Blog Title Color', 'tpSunrise' ); ?></th>
                    <td>
                        <input id="tpSunrise_options[textcolor]" class="regular-text" type="text" name="tpSunrise_options[textcolor]" value="<?php esc_attr_e( $options['textcolor'] ); ?>" />
                        <label class="description" for="tpSunrise_options[textcolor]"><?php _e( 'Enter <a target=_blank" href="http://codex.wordpress.org/Developing_a_Colour_Scheme"> hex color code</a> (including the #) for the text color of the title on alternate pages', 'tpSunrise' ); ?></label>
                    </td>
                </tr>

			</table>
			
			<?php _e( '<p>tpSunrise supports alternate styling for the home page. To enable this feature, check the alternate home page styling option. Home page style options can be set in the textarea below.</p>', 'tpSunrise');
			_e( '<p>Leave the box unchecked if you want to use the same styles on all pages.</p>', 'tpSunrise' );
			_e( '<p>If you want to customize the styles for all pages, edit <a href="theme-editor.php?file=%2Fthemes%2Ftpsunrise%2Fcustom.css&theme=tpSunrise&dir=style">custom.css</a>.</p>', 'tpSunrise' );?>
			
			<table class="form-table">
			
				<?php
				/**
				 * Use alternate home page styling?
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Use Alternate Home Page Styling', 'tpSunrise' ); ?></th>
					<td>
						<input id="tpSunrise_options[use_alt_home_style]" name="tpSunrise_options[use_alt_home_style]" type="checkbox" value="1" <?php checked( '1', $options['use_alt_home_style'] ); ?> />
						<label class="description" for="tpSunrise_options[use_alt_home_style]"><?php _e( 'Use alternate home page styling', 'tpSunrise' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * The alternate styling
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Alternate CSS for home page', 'tpSunrise' ); ?></th>
					<td>
						<textarea id="tpSunrise_options[alt_home_style_text]" class="large-text" cols="50" rows="10" name="tpSunrise_options[alt_home_style_text]"><?php echo esc_textarea( $options['alt_home_style_text'] ); ?></textarea>
						<label class="description" for="tpSunrise_options[alt_home_style_text]"><?php _e( 'Enter <a target="_blank" href="http://codex.wordpress.org/CSS">CSS</a> that you wish for the home page. For example, if you wish to remove the menu background image and make the title text larger enter:<br />
						<em><pre>#wrapper2 { background-image: none; }<br />#masthead h1 { font-size: 200%; }</pre></em>', 'tpSunrise' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'tpSunrise' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function tpSunrise_options_validate( $input ) {
	//global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['use_alt_header'] ) )
		$input['use_alt_header'] = null;
	$input['use_alt_header'] = ( $input['use_alt_header'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['alt_header_location'] = wp_filter_nohtml_kses( $input['alt_header_location'] );
	$input['textcolor'] = wp_filter_nohtml_kses( $input['textcolor'] );
	
	if ( ! isset( $input['use_alt_home_style'] ) )
		$input['use_alt_home_style'] = null;
	$input['use_alt_home_style'] = ( $input['use_alt_home_style'] == 1 ? 1 : 0 );
	
	// home page CSS must be safe text with the allowed tags for posts
	$input['alt_home_style_text'] = wp_filter_post_kses( $input['alt_home_style_text'] );

	return $input;
}

// from http://themeshaper.com/2010/06/03/sample-theme-options/
// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/