<?php
/**
 * ACF Layout - Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_media( $layouts ) {
	$layouts['layout_media'] = array(
		'key'        => 'layout_media',
		'label'      => __( 'Media', 'wsk-theme' ),
		'name'       => 'media',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_media_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'     => 'field_layout_media_media',
				'label'   => __( 'Media', 'wsk-theme' ),
				'name'    => 'ratio_media',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_ratio_media',
				),
				'display' => 'seamless',
			),
			array(
				'key'           => 'field_layout_media_full_width',
				'label'         => __( 'Full Width', 'wsk-theme' ),
				'instructions'  => __( 'Check this to set the media to be the full width of the page', 'wsk-theme' ),
				'name'          => 'full_width',
				'type'          => 'true_false',
				'default_value' => 0,
			),
			array(
				'key'     => 'field_layout_media_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_media' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_media() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['media']         = get_sub_field( 'ratio_media' );
	$attrs['full_width']    = get_sub_field( 'full_width' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_media( $attrs );
}
add_action( 'wskt_layout_builder_layout_media', 'wskt_acf_layout_media' );
