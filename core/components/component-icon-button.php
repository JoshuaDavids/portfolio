<?php
/**
 * Component - Icon Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Icon Button HTML.
 *
 * @param array $attrs Icon Button attributes.
 */
function wskt_get_icon_button( $attrs = array() ) {
	$attrs = wskt_unwrap_attrs( 'button', $attrs );

	$default_attrs = array(
		'type'       => 'icon-only',
		'size'       => '',
		'icon'       => '',
		'url'        => '', // Because we use this so often it's added here as a convenience. Could also supply a href to the attributes.
		'attributes' => array(),
		'classes'    => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Bail if the button has no icon.
	if ( empty( $attrs['icon'] ) ) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default button class.
	$classes[] = 'btn';

	// Add button type modifier class.
	if ( ! empty( $attrs['type'] ) ) {
		$classes[] = 'btn-' . $attrs['type'];
	}

	// Add button size modifier class.
	if ( ! empty( $attrs['size'] ) ) {
		$classes[] = 'btn-' . $attrs['size'];
	}

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	// Set the class attribute.
	$attrs['attributes']['class'] = implode( ' ', $classes );

	// Set the url attribute.
	if ( $attrs['url'] ) {
		$attrs['attributes']['href'] = $attrs['url'];
	}

	// Prepare the HTML tag and associated attributes.
	if ( isset( $attrs['attributes']['href'] ) ) {
		$tag = 'a';
	} else {
		$tag = 'button';

		$attrs['attributes']['type'] = $attrs['attributes']['type'] ?? 'button';
	}

	$attributes = wskt_implode_html_attributes( $attrs['attributes'] );

	// Prepare button HTML.
	$html  = '<' . $tag . ' ' . $attributes . '>';
	$html .= $attrs['icon'];
	$html .= '</' . $tag . '>';

	return $html;
}

/**
 * Output the Icon Button HTML.
 *
 * @param mixed ...$args Icon Button arguments, @see wskt_get_icon_button() for a description.
 */
function wskt_icon_button( ...$args ) {
	echo wskt_get_icon_button( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
