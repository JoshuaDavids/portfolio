<?php
/**
 * Layout - Image Carousel
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_image_carousel( $attrs = array() ) {
	$default_attrs = array(
		'gallery'   => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/image-carousel/layout-template-image-carousel',
		null,
		$args
	);
}
