<?php
/**
 * Layout - Titled Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_titled_content( $layouts ) {
	$layouts['layout_titled_content'] = array(
		'key'        => 'layout_titled_content',
		'label'      => __( 'Titled Content', 'wsk-theme' ),
		'name'       => 'titled_content',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_titled_content_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_titled_content_sections',
				'label'        => __( 'Sections', 'wsk-theme' ),
				'name'         => 'sections',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Section', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_titled_content_item_title',
						'label' => __( 'Title', 'wsk-theme' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_layout_titled_content_item_content',
						'label'        => __( 'Content', 'wsk-theme' ),
						'name'         => 'content',
						'type'         => 'wysiwyg',
						'media_upload' => 0,
						'delay'        => 1,
					),
				),
			),
			array(
				'key'     => 'field_layout_titled_content_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_titled_content' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_titled_content() {
	$args = array();

	$args['title']         = get_sub_field( 'title' );
	$args['sections']      = get_sub_field( 'sections' );
	$args['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_titled_content( $args );
}

/**
 * Hook template into layout builder.
 */
add_action( 'wskt_layout_builder_layout_titled_content', 'wskt_acf_layout_titled_content' );
