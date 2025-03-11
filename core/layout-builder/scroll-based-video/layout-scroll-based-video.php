<?php
/**
 * Layout - Scroll Based Video
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_scroll_based_video( $attrs = array() ) {
	$default_attrs = array(
		'background' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/scroll-based-video/layout-template-scroll-based-video',
		null,
		$args
	);
}
