<?php
/**
 * Layout - Cross Scrolling Images
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_cross_scrolling_images( $attrs = array() ) {
	$default_attrs = array(
		'images' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	if ( empty( $args['images'] ) ) {
		return;
	}

	get_template_part(
		'core/layout-builder/cross-scrolling-images/layout-template-cross-scrolling-images',
		null,
		$args
	);
}
