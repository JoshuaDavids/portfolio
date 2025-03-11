<?php
/**
 * Layout - Header
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_header( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'colour_scheme' => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Prepare the template arguments
	$args = array();

	$args['title']         = $attrs['title'];
	$args['colour_scheme'] = $attrs['colour_scheme'];

	get_template_part(
		'core/layout-builder/header/layout-template-header',
		null,
		$args
	);
}
