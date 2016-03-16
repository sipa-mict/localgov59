<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package divertheme
 */

/**
 * ============================================================================
 * Header Class
 * ============================================================================
 *
 */
function header_class( $class = '' ) {
	echo 'class="' . join( ' ', get_header_class( $class ) ) . '"';
}

function get_header_class( $class = '' ) {
	$classes = array();

	$classes[] = 'header';

	$classes = array_map( 'esc_attr', $classes );

	$classes = apply_filters( 'header_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * ============================================================================
 * Footer Class
 * ============================================================================
 *
 */
function footer_class( $class = '' ) {
	echo 'class="' . join( ' ', get_footer_class( $class ) ) . '"';
}

function get_footer_class( $class = '' ) {
	$classes = array();

	$classes[] = 'footer';

	$classes = array_map( 'esc_attr', $classes );

	$classes = apply_filters( 'footer_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * ============================================================================
 * Check if the current view is rendering in the Customizer preview pane.
 * ============================================================================
 *
 * @return bool    True if in the preview pane.
 */
function divertheme_is_preview() {
	global $wp_customize;

	return ( isset( $wp_customize ) && $wp_customize->is_preview() );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 *
 * @return array
 */
function divertheme_page_menu_args( $args ) {
	$args['show_home'] = true;

	return $args;
}

add_filter( 'wp_page_menu_args', 'divertheme_page_menu_args' );

/**
 * ============================================================================
 * Adds custom classes to the array of body classes.
 * ============================================================================
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function divertheme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	global $divertheme_header_preset;
	if ( $divertheme_header_preset == 'default' || $divertheme_header_preset == '' ) {
		$classes[] = get_theme_mod( 'header_preset', header_preset );
	} elseif ( $divertheme_header_preset != 'default' ) {
		$classes[] = $divertheme_header_preset;
	} else {
		$classes[] = get_theme_mod( 'header_preset', header_preset );
	};

	if ( get_theme_mod( 'box_mode_enable' ) ) {
		$classes[] = 'boxed';
	}

	global $divertheme_uncover_enable, $wc_divertheme_uncover_enable;
	if ( ( get_theme_mod( 'footer_uncovering_enable', footer_uncovering_enable ) || $divertheme_uncover_enable == 'enable' || $wc_divertheme_uncover_enable == 'enable' ) && $divertheme_uncover_enable != 'disable' && $wc_divertheme_uncover_enable != 'disable' ) {
		$classes[] = 'uncover';
	}

	global $divertheme_disable_title;
	if ( $divertheme_disable_title == 'on' ) {
		$classes[] = 'disable-title';
	}

	global $divertheme_bread_crumb_enable;
	if ( $divertheme_bread_crumb_enable == 'disable' ) {
		$classes[] = 'disable-breadcrumb';
	}

	if ( get_post_meta( get_the_ID(), "divertheme_contact_address", true ) && is_page_template() ) {
		$classes[] = 'map-enable';
	}

	global $divertheme_sticky_header, $wc_divertheme_sticky_header;
	if ( ( get_theme_mod( 'header_sticky_enable', header_sticky_enable ) || $divertheme_sticky_header == 'enable' || $wc_divertheme_sticky_header == 'enable' ) && $divertheme_sticky_header != 'disable' && $wc_divertheme_sticky_header != 'disable' ) {
		$classes[] = 'header-sticky';
	}

	global $divertheme_header_top, $wc_divertheme_header_top;
	if ( ( get_theme_mod( 'header_top_enable', header_top_enable ) || $divertheme_header_top == 'enable' || $wc_divertheme_header_top == 'enable' ) && $divertheme_header_top != 'disable' && $wc_divertheme_header_top != 'disable' ) {
		$classes[] = 'top-area-enable';
	}

	global $divertheme_enable_page_layout_private, $divertheme_page_layout_private;
	if ( get_theme_mod( 'site_layout', site_layout ) == 'full-width' || $divertheme_page_layout_private == 'full-width' ) {
		$classes[] = 'full-width';
	} elseif ( get_theme_mod( 'site_layout', site_layout ) == 'content-sidebar' || $divertheme_page_layout_private == 'content-sidebar' ) {
		$classes[] = 'content-sidebar';
	} elseif ( get_theme_mod( 'site_layout', site_layout ) == 'sidebar-content' || $divertheme_page_layout_private == 'sidebar-content' ) {
		$classes[] = 'sidebar-content';
	}

	global $divertheme_custom_class;
	if ( $divertheme_custom_class ) {
		$classes[] = $divertheme_custom_class;
	}

	$classes[] = 'scheme';

	if ( defined( 'TM_CORE_VERSION' ) ) {
		$classes[] = 'core_' . str_replace( ".", "", TM_CORE_VERSION );
	}

	return $classes;
}

add_filter( 'body_class', 'divertheme_body_classes' );

/**
 * ============================================================================
 * Enable HTML code in WordPress Widget Titles
 * ============================================================================
 *
 */
function html_widget_title( $title ) {
//HTML tag opening/closing brackets
	$title = str_replace( '[', '<', $title );
	$title = str_replace( '[/', '</', $title );
// bold -- changed from 's' to 'strong' because of strikethrough code
	$title = str_replace( 'strong]', 'strong>', $title );
	$title = str_replace( 'b]', 'b>', $title );
// italic
	$title = str_replace( 'em]', 'em>', $title );
	$title = str_replace( 'i]', 'i>', $title );
// underline
// $title = str_replace( 'u]', 'u>', $title ); // could use this, but it is deprecated so use the following instead
	$title = str_replace( '<u]', '<span style="text-decoration:underline;">', $title );
	$title = str_replace( '</u]', '</span>', $title );
// superscript
	$title = str_replace( 'sup]', 'sup>', $title );
// subscript
	$title = str_replace( 'sub]', 'sub>', $title );
// del
	$title = str_replace( 'del]', 'del>', $title ); // del is like strike except it is not deprecated, but strike has wider browser support -- you might want to replace the following 'strike' section to replace all with 'del' instead
// strikethrough or <s></s>
	$title = str_replace( 'strike]', 'strike>', $title );
	$title = str_replace( 's]', 'strike>', $title ); // <s></s> was deprecated earlier than so we will convert it
	$title = str_replace( 'strikethrough]', 'strike>', $title ); // just in case you forget that it is 'strike', not 'strikethrough'
// tt
	$title = str_replace( 'tt]', 'tt>', $title ); // Will not look different in some themes, like Twenty Eleven -- FYI: http://reference.sitepoint.com/html/tt
// marquee
	$title = str_replace( 'marquee]', 'marquee>', $title );
// blink
	$title = str_replace( 'blink]', 'blink>', $title ); // only Firefox and Opera support this tag
// wtitle1 (to be styled in style.css using .wtitle1 class)
	$title = str_replace( '<wtitle1]', '<span class="wtitle1">', $title );
	$title = str_replace( '</wtitle1]', '</span>', $title );
// wtitle2 (to be styled in style.css using .wtitle2 class)
	$title = str_replace( '<wtitle2]', '<span class="wtitle2">', $title );
	$title = str_replace( '</wtitle2]', '</span>', $title );

	return $title;
}

add_filter( 'widget_title', 'html_widget_title' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function divertheme_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}

add_action( 'wp', 'divertheme_setup_author' );

//custom comment form
function divertheme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, $size = '100' ); ?>
		</div>
		<div class="comment-content">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'divertheme' ) ?></em>
				<br/>
			<?php endif; ?>
			<div class="metadata">
				<?php printf( __( '<cite class="fn">%s</cite>','divertheme' ), get_comment_author_link() ) ?> <br/>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf( __( '%1$s', 'divertheme' ), get_comment_date(), get_comment_time() ) ?></a>
				<?php edit_comment_link( __( '(Edit)', 'divertheme' ), '  ', '' ) ?>
			</div>
			<?php comment_text() ?>
			<?php comment_reply_link( array_merge( $args, array( 'depth'     => $depth,
			                                                     'max_depth' => $args['max_depth']
			) ) ) ?>
		</div>
	</div>
	<?php
}

function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if ( is_page() && ( $post->post_parent == $pid || is_page( $pid ) ) ) {
		return true;
	}   // we're at the page or at a sub page
	else {
		return false;
	}  // we're elsewhere
}

;

function new_projects_fields( $fields ) {
	$fields['location'] = array(
		'name'        => __( 'Location', 'projects' ),
		'description' => __( 'Enter a location for this project.', 'projects' ),
		'type'        => 'text',
		'default'     => '',
		'section'     => 'info'
	);

	$fields['surface_area'] = array(
		'name'        => __( 'Surface Area', 'projects' ),
		'description' => __( 'Enter a surface area for this project.', 'projects' ),
		'type'        => 'text',
		'default'     => '',
		'section'     => 'info'
	);

	$fields['year_completed'] = array(
		'name'        => __( 'Year Completed', 'projects' ),
		'description' => __( 'Enter a year Completed for this project.', 'projects' ),
		'type'        => 'text',
		'default'     => '',
		'section'     => 'info'
	);

	$fields['value'] = array(
		'name'        => __( 'Value', 'projects' ),
		'description' => __( 'Enter a value for this project.', 'projects' ),
		'type'        => 'text',
		'default'     => '',
		'section'     => 'info'
	);

	$fields['architect'] = array(
		'name'        => __( 'Architect', 'projects' ),
		'description' => __( 'Enter a architect for this project.', 'projects' ),
		'type'        => 'text',
		'default'     => '',
		'section'     => 'info'
	);

	$pt_array = ( $pt_array = vc_editor_post_types() ) ? ( $pt_array ) : vc_default_editor_post_types(); // post type array
	if ( in_array( 'project', $pt_array ) ) {
		$fields['use_vc'] = array(
			'name'        => __( 'Use Visual Composer', 'projects' ),
			'description' => __( 'Use Visual Composer for this project', 'projects' ),
			'type'        => 'checkbox',
			'default'     => 'no',
			'section'     => 'info'
		);
	}

	return $fields;
}

add_filter( 'projects_custom_fields', 'new_projects_fields' );

/**
 * ============================================================================
 * Query post type
 * ============================================================================
 */
function divertheme_posttype_query( $syntax ) {
	$query      = new WP_Query( $syntax );
	$record_set = array();
	$i          = 0;
	if ( $query->have_posts() ):
		while ( $query->have_posts() ):
			$query->the_post();
			if ( array_key_exists( get_the_title(), $record_set ) ) {
				$i ++;
				$record_set[ get_the_title() . ' - ' . $i ] = get_the_ID();
			} else {
				$record_set[ get_the_title() ] = get_the_ID();
			}
		endwhile;
	endif;

	return $record_set;
}
