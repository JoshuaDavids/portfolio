<?php
/**
 * ACF Layout - Layered Animation
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_layered_animation( $layouts ) {
	$layouts['layout_layered_animation'] = array(
		'key'        => 'layout_layered_animation',
		'label'      => __( 'Layered Animation', 'wsk-theme' ),
		'name'       => 'layered_animation',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_layered_animation_layers',
				'label'        => __( 'Layers', 'wsk-theme' ),
				'name'         => 'layers',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Layer', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'           => 'field_layout_layered_animation_layer_type',
						'label'         => __( 'Type', 'wsk-theme' ),
						'name'          => 'type',
						'type'          => 'select',
						'choices'       => array(
							'image'     => __( 'Image', 'wsk-theme' ),
							'animation' => __( 'Animation', 'wsk-theme' ),
						),
						'default_value' => 'image',
						'return_format' => 'value',
					),
					array(
						'key'               => 'field_layout_layered_animation_layer_image',
						'label'             => __( 'Image', 'wsk-theme' ),
						'name'              => 'image',
						'type'              => 'image',
						'return_format'     => 'id',
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_layout_layered_animation_layer_type',
									'operator' => '==',
									'value'    => 'image',
								),
							),
						),
					),
					array(
						'key'               => 'field_layout_layered_animation_layer_animation',
						'label'             => __( 'Animation', 'wsk-theme' ),
						'name'              => 'animation',
						'type'              => 'file',
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_layout_layered_animation_layer_type',
									'operator' => '==',
									'value'    => 'animation',
								),
							),
						),
					),
				),
			),
			array(
				'key'   => 'field_layout_layered_animation_content',
				'label' => __( 'Content', 'wsk-theme' ),
				'name'  => 'content',
				'type'  => 'textarea',
			),
			array(
				'key'     => 'field_layout_layered_animation_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_layered_animation' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_layered_animation() {
	$attrs = array();

	$attrs['layers']  = get_sub_field( 'layers' );
	$attrs['content'] = get_sub_field( 'content' );
	$attrs['button']  = get_sub_field( 'button' );

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_layered_animation( $attrs );
}
add_action( 'wskt_layout_builder_layout_layered_animation', 'wskt_acf_layout_layered_animation' );
