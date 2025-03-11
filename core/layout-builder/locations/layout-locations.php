<?php
/**
 * Layout - Locations
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_locations( $attrs = array() ) {
	$default_attrs = array(
		'intro'         => '',
		'content'       => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/locations/layout-template-locations',
		null,
		$args
	);
}
