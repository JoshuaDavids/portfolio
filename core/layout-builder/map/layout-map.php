<?php
/**
 * Layout - Map
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_map( $attrs = array() ) {
	$default_attrs = array(
		'locations'       => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/map/layout-template-map',
		null,
		$args
	);
}
