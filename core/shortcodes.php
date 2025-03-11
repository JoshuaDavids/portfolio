<?php
/**
 * Shortcodes
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register "Icon" shortcode
 *
 * @param array $attrs Array of Shortcode attributes.
 * @param mixed $content The Shortcode content.
 */
function wskt_shortcode_icon( $attrs, $content = '' ) {
	$attrs = shortcode_atts(
		array(
			'name'    => '',
			'package' => 'wsk',
			'size'    => 'default',
		),
		$attrs
	);

	if ( '' === $attrs['name'] ) {
		return;
	}

	$icon_attrs = array();

	if ( 'lg' === $attrs['size'] ) {
		$icon_attrs['height'] = 64;
		$icon_attrs['width']  = 64;
	}

	return wskt_get_icon(
		$attrs['name'],
		$attrs['package'],
		$icon_attrs
	);
}
add_shortcode( 'icon', 'wskt_shortcode_icon' );

/**
 * Register "Copyright Year" shortcode
 */
function wskt_shortcode_copyright_year() {
	return sprintf( '&copy;%1$s', gmdate( 'Y' ) );
}
add_shortcode( 'copyright_year', 'wskt_shortcode_copyright_year' );

/**
 * Register "Lead" shortcode
 *
 * Wraps a text block in a leading paragraph tag.
 *
 * @param array $attrs Array of Shortcode attributes.
 * @param mixed $content The Shortcode content.
 */
function wskt_shortcode_lead( $attrs, $content = '' ) {
	$attrs = shortcode_atts(
		array(
			'size' => '',
		),
		$attrs
	);

	if ( empty( $content ) ) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default lead class.
	$classes[] = 'lead';

	if ( ! empty( $attrs['size'] ) ) {
		$classes[] = 'lead--' . $attrs['size'];
	}

	return sprintf( '<p class="%1$s">%2$s</p>', implode( ' ', $classes ), $content );
}
add_shortcode( 'lead', 'wskt_shortcode_lead' );
