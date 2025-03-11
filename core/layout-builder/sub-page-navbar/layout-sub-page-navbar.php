<?php
/**
 * Layout - Sub Page Navbar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_sub_page_navbar( $attrs = array() ) {
	$default_attrs = array(
		'title' => '',
		'links' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/sub-page-navbar/layout-template-sub-page-navbar',
		null,
		$args
	);
}
