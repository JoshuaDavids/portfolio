<?php
/**
 * Layout - Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_tabs( $layouts ) {
	$layouts['layout_tabs'] = array(
		'key'        => 'layout_tabs',
		'label'      => __( 'Tabs', 'wsk-theme' ),
		'name'       => 'tabs',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_tabs_tabs',
				'label'        => __( 'Tabs', 'wsk-theme' ),
				'name'         => 'tabs',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Tab', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_tabs_item_title',
						'label' => __( 'Title', 'wsk-theme' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_layout_tabs_item_content',
						'label'        => __( 'Content', 'wsk-theme' ),
						'name'         => 'content',
						'type'         => 'wysiwyg',
						'media_upload' => 0,
						'delay'        => 1,
					),
					array(
						'key'     => 'field_layout_tabs_item_button',
						'label'   => __( 'Button', 'wsk-theme' ),
						'name'    => 'button',
						'type'    => 'clone',
						'clone'   => array(
							0 => 'field_button',
						),
						'display' => 'seamless',
					),
				),
			),
			array(
				'key'     => 'field_layout_tabs_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_tabs' );

/**
 * Layout template function.
 */
function wskt_acf_layout_tabs() {
	$args = array();

	$args['tabs']          = get_sub_field( 'tabs' );
	$args['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_tabs( $args );
}

/**
 * Hook template into layout builder.
 */
add_action( 'wskt_layout_builder_layout_tabs', 'wskt_acf_layout_tabs' );
