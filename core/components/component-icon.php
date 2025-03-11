<?php
/**
 * Component - Icon
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Icon HTML.
 *
 * @param string $icon_name Name of the Icon.
 * @param string $icon_set Set the Icon belongs to.
 * @param array  $svg_attrs SVG Attributes, @see wskts_get_inline_svg() for a description.
 */
function wskt_get_icon( $icon_name, $icon_set = 'remix/system', $svg_attrs = array() ) {
	if ( ! $icon_name ) {
		return;
	}

	$default_svg_attrs = array(
		'class'  => 'icon',
		'height' => 16,
		'width'  => 16,
	);

	$parsed_svg_attrs = wp_parse_args( $svg_attrs, $default_svg_attrs );

	$path = get_stylesheet_directory() . '/dist/icons/' . $icon_set . '/' . $icon_name . '.svg';

	return wskts_get_inline_svg( $path, $parsed_svg_attrs );
}

/**
 * Output the Icon HTML.
 *
 * @param mixed ...$args Icon arguments, @see wskt_get_icon() for a description.
 */
function wskt_icon( ...$args ) {
	echo wp_kses( wskt_get_icon( ...$args ), 'svg' );
}
