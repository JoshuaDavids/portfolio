<?php
/**
 * ACF Layout - Call To Action
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_call_to_action( $layouts ) {
	$layouts['layout_call_to_action'] = array(
		'key'        => 'layout_call_to_action',
		'label'      => __( 'Call To Action', 'wsk-theme' ),
		'name'       => 'call_to_action',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_call_to_action_background',
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
				'key'   => 'field_layout_call_to_action_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_call_to_action_content',
				'label'        => __( 'Content', 'wsk-theme' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'media_upload' => 1,
				'delay'        => 1,
			),
			array(
				'key'     => 'field_layout_call_to_action_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_call_to_action' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_call_to_action() {
	$attrs = array();

	$attrs['background'] = get_sub_field( 'background_media' );
	$attrs['title']      = get_sub_field( 'title' );
	$attrs['content']    = get_sub_field( 'content' );
	$attrs['button']     = get_sub_field( 'button' );

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_call_to_action( $attrs );
}
add_action( 'wskt_layout_builder_layout_call_to_action', 'wskt_acf_layout_call_to_action' );
