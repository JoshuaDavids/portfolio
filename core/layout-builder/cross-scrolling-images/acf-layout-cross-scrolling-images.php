<?php
/**
 * ACF Layout - Cross Scrolling Images
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_cross_scrolling_images( $layouts ) {
	$layouts['layout_cross_scrolling_images'] = array(
		'key'        => 'layout_cross_scrolling_images',
		'label'      => __( 'Cross Scrolling Images', 'wsk-theme' ),
		'name'       => 'cross_scrolling_images',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_cross_scrolling_images_images',
				'label'        => __( 'Images', 'wsk-theme' ),
				'name'         => 'images',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Image', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'           => 'field_layout_cross_scrolling_images_image_scroll_direction',
						'label'         => __( 'Scroll Direction', 'wsk-theme' ),
						'name'          => 'scroll_direction',
						'type'          => 'select',
						'choices'       => array(
							'left'  => __( 'Left', 'wsk-theme' ),
							'right' => __( 'Right', 'wsk-theme' ),
						),
						'default_value' => 'left',
						'return_format' => 'value',
					),
					array(
						'key'               => 'field_layout_cross_scrolling_images_image_image',
						'label'             => __( 'Image', 'wsk-theme' ),
						'name'              => 'image',
						'type'              => 'image',
						'return_format'     => 'id',
					),
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_cross_scrolling_images' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_cross_scrolling_images() {
	$attrs = array();

	$attrs['images'] = get_sub_field( 'images' );

	wskt_layout_cross_scrolling_images( $attrs );
}
add_action( 'wskt_layout_builder_layout_cross_scrolling_images', 'wskt_acf_layout_cross_scrolling_images' );
