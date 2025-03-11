<?php
/**
 * Template Function - Sidebar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Sidebar HTML.
 *
 * @param array $attrs Sidebar attributes.
 */
function wskt_get_sidebar( $attrs = array() ) {
	$default_attrs = array(
		'header'  => '',
		'body'    => '',
		'footer'  => '',
		'classes' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Initialise array for holding classes.
	$classes = array();

	// Add the default sidebar class.
	$classes[] = 'sidebar';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	$output  = '';
	$output .= sprintf( '<div class="%1$s">', implode( ' ', $classes ) );

	if ( $attrs['header'] ) {
		$output .= sprintf(
			'<div class="sidebar__header">%1$s</div>',
			$attrs['header'],
		);
	}

	if ( $attrs['body'] ) {
		$output .= sprintf(
			'<div class="sidebar__body">%1$s</div>',
			$attrs['body']
		);
	}

	if ( $attrs['footer'] ) {
		$output .= sprintf(
			'<div class="sidebar__footer">%1$s</div>',
			$attrs['footer']
		);
	}

	$output .= '</div>';

	return $output;
}

/**
 * Output the Sidebar HTML.
 *
 * @param mixed ...$args Sidebar arguments, @see wskt_get_sidebar() for a description.
 */
function wskt_sidebar( ...$args ) {
	echo wskt_get_sidebar( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
