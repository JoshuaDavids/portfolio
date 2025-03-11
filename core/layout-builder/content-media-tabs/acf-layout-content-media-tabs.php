<?php
/**
 * ACF Layout - Content / Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_content_media_tabs( $layouts ) {
	$layouts['layout_content_media_tabs'] = array(
		'key'        => 'layout_content_media_tabs',
		'label'      => __( 'Content / Media Tabs', 'wsk-theme' ),
		'name'       => 'content_media_tabs',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_content_media_tabs_title',
				'label'        => __( 'Title', 'wsk-theme' ),
				'name'         => 'title',
				'type'         => 'text',
			),
			array(
				'key'          => 'field_layout_content_media_tabs_intro',
				'label'        => __( 'Intro', 'wsk-theme' ),
				'name'         => 'intro',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'          => 'field_layout_content_media_tabs_tabs',
				'label'        => __( 'Tabs', 'wsk-theme' ),
				'name'         => 'tabs',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Tab', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_content_media_tabs_tab_title',
						'label' => __( 'Title', 'wsk-theme' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_layout_content_media_tabs_tab_content',
						'label'        => __( 'Content', 'wsk-theme' ),
						'name'         => 'content',
						'type'         => 'wysiwyg',
						'media_upload' => 0,
						'delay'        => 1,
					),
					array(
						'key'     => 'field_layout_content_media_tabs_tab_button',
						'label'   => __( 'Button', 'wsk-theme' ),
						'name'    => 'button',
						'type'    => 'clone',
						'clone'   => array(
							0 => 'field_button',
						),
						'display' => 'seamless',
					),
					array(
						'key'     => 'field_layout_content_media_tabs_tab_media',
						'label'   => __( 'Media', 'wsk-theme' ),
						'name'    => 'ratio_media',
						'type'    => 'clone',
						'clone'   => array(
							0 => 'field_ratio_media',
						),
						'display' => 'seamless',
					),
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_content_media_tabs' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_content_media_tabs() {
	$attrs = array();

	$attrs['title'] = get_sub_field( 'title' );
	$attrs['intro'] = get_sub_field( 'intro' );
	$attrs['tabs']  = get_sub_field( 'tabs' );

	wskt_layout_content_media_tabs( $attrs );
}
add_action( 'wskt_layout_builder_layout_content_media_tabs', 'wskt_acf_layout_content_media_tabs' );
