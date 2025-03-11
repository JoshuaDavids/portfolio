<?php

/**
 * Component - Back Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Back Button HTML.
 *
 * @param array $attrs Button attributes.
 */
function wskt_get_back_button( $attrs = array() ) {
	$default_attrs = array(
		'url'        => '',
		'attributes' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Bail if the button has no text.
	if ( empty( $attrs['url'] ) ) {
		return;
	}

	$output = wskt_get_button(
		array(
			'type'       => 'blank',
			'left_icon'  => wskt_get_icon(
				'arrow-left-line',
				'remix/arrows',
			),
			'text'       => esc_attr__( 'Back', 'wsk-theme' ),
			'url'        => esc_url( $attrs['url'] ),
			'attributes' => $attrs['attributes'],
			'classes'    => array( 'btn-back' ),
		)
	);

	return $output;
}

/**
 * Output the Back Button HTML.
 *
 * @param mixed ...$args Button arguments, @see wskt_get_back_button() for a description.
 */
function wskt_back_button( ...$args ) {
	echo wskt_get_back_button( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
