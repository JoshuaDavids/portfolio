<?php
/**
 * ACF Layout - Image Carousel
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_image_carousel( $layouts ) {
	$layouts['layout_image_carousel'] = array(
		'key'        => 'layout_image_carousel',
		'label'      => __( 'Image Carousel', 'wsk-theme' ),
		'name'       => 'image_carousel',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_image_carousel_items',
				'label'        => __( 'Gallery', 'wsk-theme' ),
				'name'         => 'gallery',
				'type'         => 'gallery',
				'button_label' => __( 'Add Gallery', 'wsk-theme' ),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_image_carousel' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_image_carousel() {
	$attrs            = array();
	$attrs['gallery'] = get_sub_field( 'gallery' );

	wskt_layout_image_carousel( $attrs );
}
add_action( 'wskt_layout_builder_layout_image_carousel', 'wskt_acf_layout_image_carousel' );
