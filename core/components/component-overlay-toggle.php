<?php
/**
 * Component - Overlay Toggle
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Overlay Toggle HTML.
 *
 * @param array $attrs Overlay Toggle attributes.
 */
function wskt_get_overlay_toggle( $attrs = array() ) {
	$default_attrs = array(
		'id'      => '',
		'icon'    => '',
		'classes' => array( 'overlay-toggle' ),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$button = array(
		'icon'       => $attrs['icon'],
		'attributes' => array(
			'data-wsk-toggle' => 'overlay',
			'data-wsk-target' => '#' . $attrs['id'],
		),
		'classes'    => $attrs['classes'],
	);

	return wskt_get_icon_button( $button );
}

/**
 * Output the Overlay Toggle HTML.
 *
 * @param mixed ...$args Overlay Toggle arguments, @see wskt_get_overlay_toggle() for a description.
 */
function wskt_overlay_toggle( ...$args ) {
	echo wskt_get_overlay_toggle( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
