<?php
/**
 * Layout - Titled Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_titled_content( $attrs = array() ) {
	$default_attrs = array(

		'title'         => '',
		'sections'      => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/titled-content/layout-template-titled-content',
		null,
		$args
	);
}
