<?php
/**
 * Layout - Parallax Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_parallax_hero( $attrs = array() ) {
	$default_attrs = array(
		'background' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/parallax-hero/layout-template-parallax-hero',
		null,
		$args
	);
}
