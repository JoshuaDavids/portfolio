<?php

/**
 * ACF Layout - Content / Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_testimonials_slider( $layouts ) {
	$layouts['layout_testimonials_slider'] = array(
		'key'        => 'layout_testimonials_slider',
		'label'      => __( 'Testimonials Slider', 'wsk-theme' ),
		'name'       => 'testimonials_slider',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_testimonials_slider_items',
				'label'        => __( 'Items', 'wsk-theme' ),
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Testimonial', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_testimonials_slider_item_name',
						'label' => __( 'Name', 'wsk-theme' ),
						'name'  => 'name',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_layout_testimonials_slider_item_role',
						'label' => __( 'Role', 'wsk-theme' ),
						'name'  => 'role',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_layout_testimonials_slider_item_content',
						'label'        => __( 'Content', 'wsk-theme' ),
						'name'         => 'content',
						'type'         => 'textarea',
					),
					array(
						'key'     => 'field_layout_testimonials_slider_item_media',
						'label'   => __( 'Media', 'wsk-theme' ),
						'name'    => 'ratio_media',
						'type'    => 'clone',
						'clone'   => array(
							0 => 'field_ratio_media',
						),
						'display' => 'seamless',
					),
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_testimonials_slider' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_testimonials_slider() {
	$attrs = array(
		'items' => get_sub_field( 'items' ),
	);

	wskt_layout_testimonials_slider( $attrs );
}
add_action( 'wskt_layout_builder_layout_testimonials_slider', 'wskt_acf_layout_testimonials_slider' );
