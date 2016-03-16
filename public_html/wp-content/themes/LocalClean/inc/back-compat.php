<?php
/**
 * divertheme back compat functionality
 *
 * Prevents divertheme from running on WordPress versions prior to 3.9,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 3.9.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since divertheme 1.0
 */

/**
 * Prevent switching to divertheme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since divertheme 1.0
 */
function divertheme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'divertheme_upgrade_notice' );
}

add_action( 'after_switch_theme', 'divertheme_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * divertheme on WordPress versions prior to 3.9.
 *
 * @since Twenty Fifteen 1.0
 */
function divertheme_upgrade_notice() {
	$message = sprintf( __( 'divertheme requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'divertheme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.9.
 *
 * @since divertheme 1.0
 */
function divertheme_customize() {
	wp_die( sprintf( __( 'divertheme requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'divertheme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}

add_action( 'load-customize.php', 'divertheme_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.9.
 *
 * @since divertheme 1.0
 */
function divertheme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'divertheme requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'divertheme' ), $GLOBALS['wp_version'] ) );
	}
}

add_action( 'template_redirect', 'divertheme_preview' );
