<?php
/**
 * divertheme functions and definitions
 *
 * @package divertheme
 */

/**
 * ============================================================================
 * Set the content width based on the theme's design and stylesheet.
 * ============================================================================
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * ============================================================================
 * divertheme only works in WordPress 3.9 or later.
 * ============================================================================
 */
if ( version_compare( $GLOBALS['wp_version'], '3.9', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * ============================================================================
 * Define Constants
 * ============================================================================
 */
define( 'THEME_ROOT', get_template_directory_uri() );
require_once get_template_directory() . '/inc/variables.php';

if ( ! function_exists( 'divertheme_setup' ) ) :
	/**
	 * ============================================================================
	 * Sets up theme defaults and registers support for various WordPress features.
	 * ============================================================================
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function divertheme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on divertheme, use a find and replace
		 * to change 'divertheme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'divertheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( "post-thumbnails" );
		add_image_size( 'post-thumb', 848, 450, true );
		add_image_size( 'post-thumb-2', 320, 300, true );
		add_image_size( 'small-thumb', 120, 90, true );
		add_image_size( 'project-single', 1170, 600, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'divertheme' ),
			'social'  => __( 'Social Profile Links', 'divertheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', ) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'divertheme_custom_background_args', array(
			'default-color' => 'f7f7f7',
		) ) );

	}
endif; // divertheme_setup
add_action( 'after_setup_theme', 'divertheme_setup' );

/**
 * ============================================================================
 * Register widget area.
 * ============================================================================
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function divertheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'divertheme' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Bottom', 'divertheme' ),
		'id'            => 'homepage-bottom',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom', 'divertheme' ),
		'id'            => 'content-bottom',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Slider', 'divertheme' ),
		'id'            => 'top-slider',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Widget Area', 'divertheme' ),
		'id'            => 'top-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right Widget Area', 'divertheme' ),
		'id'            => 'header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1 Widget Area', 'divertheme' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2 Widget Area', 'divertheme' ),
		'id'            => 'footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3 Widget Area', 'divertheme' ),
		'id'            => 'footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4 Widget Area', 'divertheme' ),
		'id'            => 'footer4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	if ( class_exists( 'SitePress' ) || class_exists( 'Polylang' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Language Widget Area', 'divertheme' ),
			'id'            => 'lang-area',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget widget-language %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( class_exists( 'WP_Job_Manager' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Job Widget Area', 'divertheme' ),
			'id'            => 'job-area',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget widget-job %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}

add_action( 'widgets_init', 'divertheme_widgets_init' );

/**
 * ============================================================================
 * Enqueue scripts and styles.
 * ===========================================================================
 */
function divertheme_scripts() {
	wp_enqueue_style( 'divertheme-style', THEME_ROOT . '/style.css' );
	wp_enqueue_style( 'divertheme-main', THEME_ROOT . '/css/main-style.css' );
	wp_enqueue_style( 'divertheme-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	if ( get_theme_mod( 'page_transition' ) == 'type1' ) {
		wp_enqueue_script( 'divertheme-js-nprogress', THEME_ROOT . '/js/nprogress.js', array( 'jquery' ), null, true );
	} elseif ( get_theme_mod( 'page_transition' ) == 'type2' ) {
		wp_enqueue_script( 'divertheme-js-animsition', THEME_ROOT . '/js/jquery.animsition.min.js', array( 'jquery' ), null, true );
	}
	wp_enqueue_script( 'divertheme-js-stellar', THEME_ROOT . '/js/jquery.stellar.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'divertheme-js-owl-carousel', THEME_ROOT . '/js/owl.carousel.min.js' );
	if ( get_theme_mod( 'enable_smooth_scroll', enable_smooth_scroll ) ) {
		wp_enqueue_script( 'divertheme-js-smooth-scroll', THEME_ROOT . '/js/smoothscroll.js' );
	}
	global $divertheme_sticky_header;
	if ( ( get_theme_mod( 'header_sticky_enable', header_sticky_enable ) || $divertheme_sticky_header == 'enable' ) && $divertheme_sticky_header != 'disable' ) {
		wp_enqueue_script( 'divertheme-js-head-room-jquery', THEME_ROOT . '/js/jQuery.headroom.min.js' );
		wp_enqueue_script( 'divertheme-js-head-room', THEME_ROOT . '/js/headroom.min.js' );
	}
	wp_enqueue_script( 'divertheme-js-magnific', THEME_ROOT . '/js/jquery.magnific-popup.min.js' );
	if ( is_page_template( 'template-contact.php' ) ) {
		wp_enqueue_script( 'divertheme-js-maps', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en' );
		wp_enqueue_script( 'divertheme-js-gmap3', THEME_ROOT . '/js/gmap3.min.js' );
	}
	wp_enqueue_script( 'divertheme-js-counterup', THEME_ROOT . '/js/jquery.counterup.min.js' );
	wp_enqueue_script( 'divertheme-js-waypoints', THEME_ROOT . '/js/waypoints.min.js' );
	wp_enqueue_script( 'divertheme-js-main', THEME_ROOT . '/js/main.js', array( 'jquery' ), null, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'divertheme_scripts' );

/**
 * ============================================================================
 * Loading components.
 * ============================================================================
 */
require_once get_template_directory() . '/core/divertheme-core.php';
require_once get_template_directory() . '/inc/oneclick.php';
require_once get_template_directory() . '/inc/extras.php';
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/jetpack.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/metabox.php';
require_once get_template_directory() . '/inc/custom-css.php';
require_once get_template_directory() . '/inc/custom-js.php';

/**
 * ============================================================================
 * Requirement Plugins
 * ============================================================================
 */
require_once get_template_directory() . '/inc/tmg-plugin-activation.php';
require_once get_template_directory() . '/inc/tmg-plugin-registration.php';

/**
 * ============================================================================
 * Auto Update Theme
 * ============================================================================
 */
require_once( 'wp-updates-theme.php' );
new WPUpdatesThemeUpdater_1276( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );


/**
 * ============================================================================
 * General setups
 * ============================================================================
 */
add_filter( 'widget_text', 'do_shortcode' );
//add_filter( 'the_excerpt', 'do_shortcode');

// Remove admin notification of Projects
if ( class_exists( 'Projects_Admin' ) ) {
	global $projects;
	remove_action( 'admin_notices', array( $projects->admin, 'configuration_admin_notice' ) );
}

add_filter( 'projects_enqueue_styles', '__return_false' );

add_filter( 'loop_shop_columns', 'loop_columns' );
if ( ! function_exists( 'loop_columns' ) ) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 6;' ), 20 );

// Extend VC
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
	function requireVcExtend() {
		require_once get_template_directory() . '/inc/vc-extend.php';
	}

	add_action( 'init', 'requireVcExtend', 2 );
}

// Remove admin notification of Projects
if ( class_exists( 'Projects' ) ) {
	global $projects;
	remove_action( 'admin_notices', array( $projects->admin, 'configuration_admin_notice' ) );
}
