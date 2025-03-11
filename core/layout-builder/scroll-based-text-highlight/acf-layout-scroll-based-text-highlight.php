<?php
/**
 * ACF Layout - Scroll Based Text Highlight
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_scroll_based_text_highlight( $layouts ) {
	$layouts['layout_scroll_based_text_highlight'] = array(
		'key'        => 'layout_scroll_based_text_highlight',
		'label'      => __( 'Scroll Based Text Highlight', 'wsk-theme' ),
		'name'       => 'scroll_based_text_highlight',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_scroll_based_text_highlight_background',
				'label'        => __( 'Background', 'wsk-theme' ),
				'name'         => 'background',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_media',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
			array(
				'key'          => 'field_layout_scroll_based_text_highlight_text',
				'label'        => __( 'Text', 'wsk-theme' ),
				'name'         => 'text',
				'type'         => 'textarea',
			),

		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_scroll_based_text_highlight' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_scroll_based_text_highlight() {
	$attrs = array();

	$attrs['background'] = get_sub_field( 'background_media' );
	$attrs['text']       = get_sub_field( 'text' );

	wskt_layout_scroll_based_text_highlight( $attrs );
}
add_action( 'wskt_layout_builder_layout_scroll_based_text_highlight', 'wskt_acf_layout_scroll_based_text_highlight' );
