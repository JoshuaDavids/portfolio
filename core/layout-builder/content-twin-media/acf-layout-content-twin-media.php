<?php
/**
 * ACF Layout - Content / Twin Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_content_twin_media( $layouts ) {
	$layouts['layout_content_twin_media'] = array(
		'key'        => 'layout_content_twin_media',
		'label'      => __( 'Content / Twin Media', 'wsk-theme' ),
		'name'       => 'content_twin_media',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_content_twin_media_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_content_twin_media_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 0,
				'delay'        => 1,
			),
			array(
				'key'     => 'field_layout_content_twin_media_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
			array(
				'key'          => 'field_layout_content_twin_media_media_1',
				'label'        => __( 'Media 1', 'wsk-theme' ),
				'name'         => 'media_1',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_ratio_media',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
			array(
				'key'          => 'field_layout_content_twin_media_media_2',
				'label'        => __( 'Media 2', 'wsk-theme' ),
				'name'         => 'media_2',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_ratio_media',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
			array(
				'key'     => 'field_layout_content_twin_media_alignment',
				'label'   => __( 'Alignment', 'wsk-theme' ),
				'name'    => 'alignment',
				'type'    => 'select',
				'choices' => array(
					'content-first' => 'Content First',
					'media-first'   => 'Media First',
				),
			),
			array(
				'key'     => 'field_layout_content_twin_media_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_content_twin_media' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_content_twin_media() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['content']       = get_sub_field( 'content' );
	$attrs['button']        = get_sub_field( 'button' );
	$attrs['media_1']       = get_sub_field( 'media_1_ratio_media' );
	$attrs['media_2']       = get_sub_field( 'media_2_ratio_media' );
	$attrs['alignment']     = get_sub_field( 'alignment' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_content_twin_media( $attrs );
}
add_action( 'wskt_layout_builder_layout_content_twin_media', 'wskt_acf_layout_content_twin_media' );
