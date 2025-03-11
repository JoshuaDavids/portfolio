<?php
/**
 * Reusable Fields - Button Group
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Button Group.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_button_group( $fields ) {
	$new_fields = array(
		array(
			'key'          => 'field_button_group',
			'label'        => __( 'Buttons', 'wsk-theme' ),
			'name'         => 'button_group',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => __( 'Add Button', 'wsk-theme' ),
			'sub_fields'   => array(
				array(
					'key'     => 'field_button_group_button',
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
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_button_group' );
