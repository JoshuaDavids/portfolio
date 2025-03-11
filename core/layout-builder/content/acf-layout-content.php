<?php
/**
 * ACF Layout - Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_content( $layouts ) {
	$layouts['layout_content'] = array(
		'key'        => 'layout_content',
		'label'      => __( 'Content', 'wsk-theme' ),
		'name'       => 'content',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_content_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'           => 'field_layout_content_full_width',
				'label'         => __( 'Full Width', 'wsk-theme' ),
				'name'          => 'full_width',
				'type'          => 'true_false',
				'default_value' => false,
			),
			array(
				'key'     => 'field_layout_content_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_content' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_content() {
	$attrs = array();

	$attrs['content']       = get_sub_field( 'content' );
	$attrs['full_width']    = get_sub_field( 'full_width' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_content( $attrs );
}
add_action( 'wskt_layout_builder_layout_content', 'wskt_acf_layout_content' );
