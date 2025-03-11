<?php
/**
 * ACF Layout - Split Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_split_content( $layouts ) {
	$layouts['layout_split_content'] = array(
		'key'        => 'layout_split_content',
		'label'      => __( 'Split Content', 'wsk-theme' ),
		'name'       => 'split_content',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_split_content_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_split_content_intro',
				'label'        => __( 'Intro', 'wsk-theme' ),
				'name'         => 'intro',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'          => 'field_layout_split_content_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'     => 'field_layout_split_content_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
			array(
				'key'     => 'field_layout_split_content_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_split_content' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_split_content() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['intro']         = get_sub_field( 'intro' );
	$attrs['content']       = get_sub_field( 'content' );
	$attrs['button']        = get_sub_field( 'button' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_split_content( $attrs );
}
add_action( 'wskt_layout_builder_layout_split_content', 'wskt_acf_layout_split_content' );
