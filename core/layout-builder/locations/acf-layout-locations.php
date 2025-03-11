<?php
/**
 * ACF Layout - Locations
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_locations( $layouts ) {
	$layouts['layout_locations'] = array(
		'key'        => 'layout_locations',
		'label'      => __( 'Locations', 'wsk-theme' ),
		'name'       => 'locations',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_locations_intro',
				'label'        => __( 'Intro', 'wsk-theme' ),
				'name'         => 'intro',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'          => 'field_layout_locations_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_locations' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_locations() {
	$attrs = array();

	$attrs['intro']   = get_sub_field( 'intro' );
	$attrs['content'] = get_sub_field( 'content' );

	wskt_layout_locations( $attrs );
}
add_action( 'wskt_layout_builder_layout_locations', 'wskt_acf_layout_locations' );
