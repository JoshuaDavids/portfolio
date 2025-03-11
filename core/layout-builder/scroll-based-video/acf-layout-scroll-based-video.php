<?php
/**
 * ACF Layout - Scroll Based Video
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_scroll_based_video( $layouts ) {
	$layouts['layout_scroll_based_video'] = array(
		'key'        => 'layout_scroll_based_video',
		'label'      => __( 'Scroll Based Video', 'wsk-theme' ),
		'name'       => 'scroll_based_video',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_scroll_based_video_background',
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
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_scroll_based_video' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_scroll_based_video() {
	$attrs = array();

	$attrs['background'] = get_sub_field( 'background_media' );

	wskt_layout_scroll_based_video( $attrs );
}
add_action( 'wskt_layout_builder_layout_scroll_based_video', 'wskt_acf_layout_scroll_based_video' );
