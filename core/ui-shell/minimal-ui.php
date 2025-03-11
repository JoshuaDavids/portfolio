<?php
/**
 * Minimal UI
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Filter for setting the Minimal UI.
 */
function wskt_is_minimal_ui() {
	return apply_filters( 'wskt_is_minimal_ui', false );
}

/**
 * Adds Minimal UI classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 */
function wskt_add_minimal_ui_body_classes( $classes ) {
	if ( wskt_is_minimal_ui() ) {
		$classes[] = 'is-minimal-ui';
	}

	return $classes;
}
add_filter( 'body_class', 'wskt_add_minimal_ui_body_classes' );

/**
 * Adds Minimal UI classes to the array of navbar classes.
 *
 * @param array $classes Classes for the navbar element.
 */
function wskt_add_minimal_ui_navbar_classes( $classes ) {
	if ( wskt_is_minimal_ui() ) {
		$classes[] = 'navbar-transparent';
	}

	return $classes;
}
add_filter( 'wskt_navbar_classes', 'wskt_add_minimal_ui_navbar_classes' );
