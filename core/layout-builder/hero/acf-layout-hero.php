<?php
/**
 * ACF Layout - Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_hero( $layouts ) {
	$layouts['layout_hero'] = array(
		'key'        => 'layout_hero',
		'label'      => __( 'Hero', 'wsk-theme' ),
		'name'       => 'hero',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_hero_background',
				'label'        => __( 'Background', 'wsk-theme' ),
				'name'         => 'background',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_media',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
			array(
				'key'   => 'field_layout_hero_content',
				'label' => __( 'Content', 'wsk-theme' ),
				'name'  => 'content',
				'type'  => 'textarea',
			),
			array(
				'key'     => 'field_layout_hero_button',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_hero' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_hero() {
	$attrs = array();

	$attrs['background'] = get_sub_field( 'background_media' );
	$attrs['content']    = get_sub_field( 'content' );
	$attrs['button']     = get_sub_field( 'button' );

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_hero( $attrs );
}
add_action( 'wskt_layout_builder_layout_hero', 'wskt_acf_layout_hero' );
