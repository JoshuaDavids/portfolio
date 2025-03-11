<?php
/**
 * ACF Layout - Content / Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_content_media( $layouts ) {
	$layouts['layout_content_media'] = array(
		'key'        => 'layout_content_media',
		'label'      => __( 'Content / Media', 'wsk-theme' ),
		'name'       => 'content_media',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_content_media_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_content_media_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 0,
				'delay'        => 1,
			),
			array(
				'key'     => 'field_layout_content_media_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
			array(
				'key'     => 'field_layout_content_media_media',
				'label'   => __( 'Media', 'wsk-theme' ),
				'name'    => 'media',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_ratio_media',
				),
				'display' => 'seamless',
			),
			array(
				'key'     => 'field_layout_content_media_alignment',
				'label'   => __( 'Alignment', 'wsk-theme' ),
				'name'    => 'alignment',
				'type'    => 'select',
				'choices' => array(
					'content-first' => 'Content First',
					'media-first'   => 'Media First',
				),
			),
			array(
				'key'     => 'field_layout_content_media_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_content_media' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_content_media() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['content']       = get_sub_field( 'content' );
	$attrs['button']        = get_sub_field( 'button' );
	$attrs['media']         = get_sub_field( 'ratio_media' );
	$attrs['alignment']     = get_sub_field( 'alignment' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_content_media( $attrs );
}
add_action( 'wskt_layout_builder_layout_content_media', 'wskt_acf_layout_content_media' );
