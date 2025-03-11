<?php
/**
 * ACF Layout - Map
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_map( $layouts ) {
	$layouts['layout_map'] = array(
		'key'        => 'layout_map',
		'label'      => __( 'Map', 'wsk-theme' ),
		'name'       => 'map',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_map_locations',
				'label'        => __( 'Locations', 'wsk-theme' ),
				'name'         => 'locations',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Location', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_map_locations_location',
						'label' => __( 'Location', 'wsk-theme' ),
						'name'  => 'location',
						'type'  => 'google_map',
					),
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_map' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_map() {
	if ( ! class_exists( 'WSKTS_Google_Maps' ) ) {
		return;
	}

	$args = array();

	if ( class_exists( 'WSKTS_Social_Networks' ) ) {
		$args['social_networks'] = WSKTS_Social_Networks::get_social_networks();
	}

	$args['locations'] = get_sub_field( 'locations' );

	wskt_layout_map( $args );
}
add_action( 'wskt_layout_builder_layout_map', 'wskt_acf_layout_map' );
