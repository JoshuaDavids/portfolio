<?php
/**
 * ACF Layout - Parallax Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_parallax_hero( $layouts ) {
	$layouts['layout_parallax_hero'] = array(
		'key'        => 'layout_parallax_hero',
		'label'      => __( 'Parallax Hero', 'wsk-theme' ),
		'name'       => 'parallax_hero',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_parallax_hero_background',
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
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_parallax_hero' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_parallax_hero() {
	$attrs = array();

	$attrs['background'] = get_sub_field( 'background_media' );

	wskt_layout_parallax_hero( $attrs );
}
add_action( 'wskt_layout_builder_layout_parallax_hero', 'wskt_acf_layout_parallax_hero' );
