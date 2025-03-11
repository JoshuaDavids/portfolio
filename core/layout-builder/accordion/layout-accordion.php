<?php
/**
 * Layout - Accordion
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function for a generic accordion.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_accordion( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'items'         => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/accordion/layout-template-accordion',
		null,
		$args
	);
}
