<?php
/**
 * ACF Layout - Header
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_header( $layouts ) {
	$layouts['layout_header'] = array(
		'key'        => 'layout_header',
		'label'      => __( 'Header', 'wsk-theme' ),
		'name'       => 'header',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_header_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'     => 'field_layout_header_colour_scheme',
				'label'   => __( 'Colour Scheme', 'wsk-theme' ),
				'name'    => 'colour_scheme',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_colour_scheme',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_header' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_header() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_header( $attrs );
}
add_action( 'wskt_layout_builder_layout_header', 'wskt_acf_layout_header' );
