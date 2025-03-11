<?php
/**
 * ACF Layout - Call To Action : Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_call_to_action_button( $layouts ) {
	$layouts['layout_call_to_action_button'] = array(
		'key'        => 'layout_call_to_action_button',
		'label'      => __( 'Call To Action : Button', 'wsk-theme' ),
		'name'       => 'call_to_action_button',
		'sub_fields' => array(
			array(
				'key'     => 'field_layout_call_to_action_button_button',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_call_to_action_button' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_call_to_action_button() {
	$attrs = array();

	$attrs['button'] = get_sub_field( 'button' );

	// Hard code a large button size
	$attrs['button']['size'] = 'lg';

	wskt_layout_call_to_action_button( $attrs );
}
add_action( 'wskt_layout_builder_layout_call_to_action_button', 'wskt_acf_layout_call_to_action_button' );
