<?php
/**
 * Layout - Nothing Found
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_nothing_found( $attrs = array() ) {
	$default_attrs = array(
		'title'   => '',
		'content' => '',
		'button'  => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/pages/layouts/nothing-found/layout-template-nothing-found',
		null,
		$args
	);
}
