<?php
/**
 * ACF Layout - Call To Action : Strip
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_call_to_action_strip( $layouts ) {
	$layouts['layout_call_to_action_strip'] = array(
		'key'        => 'layout_call_to_action_strip',
		'label'      => __( 'Call To Action : Strip', 'wsk-theme' ),
		'name'       => 'call_to_action_strip',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_call_to_action_strip_content',
				'label' => __( 'Content', 'wsk-theme' ),
				'name'  => 'content',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_layout_call_to_action_strip_subtitle',
				'label' => __( 'Subtitle', 'wsk-theme' ),
				'name'  => 'subtitle',
				'type'  => 'text',
			),
			array(
				'key'     => 'field_layout_call_to_action_strip_button',
				'label'   => __( 'Button', 'wsk-theme' ),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
			array(
				'key'     => 'field_layout_call_to_action_strip_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_call_to_action_strip' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_call_to_action_strip() {
	$attrs = array();

	$attrs['content']       = get_sub_field( 'content' );
	$attrs['subtitle']      = get_sub_field( 'subtitle' );
	$attrs['button']        = get_sub_field( 'button' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_call_to_action_strip( $attrs );
}
add_action( 'wskt_layout_builder_layout_call_to_action_strip', 'wskt_acf_layout_call_to_action_strip' );
