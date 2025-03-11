<?php
/**
 * Reusable Fields - Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Button.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_button( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_button',
			'label'      => __( 'Button', 'wsk-theme' ),
			'name'       => 'button',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'           => 'field_button_link',
					'label'         => __( 'Link', 'wsk-theme' ),
					'name'          => 'link',
					'type'          => 'link',
					'return_format' => 'array',
				),
				array(
					'key'           => 'field_button_activates_modal',
					'label'         => __( 'Activates Modal', 'wsk-theme' ),
					'name'          => 'activates_modal',
					'type'          => 'true_false',
					'default_value' => false,
				),
				array(
					'key'     => 'field_button_left_icon',
					'label'   => __( 'Left Icon', 'wsk-theme' ),
					'name'    => 'left_icon',
					'type'    => 'text',
					'wrapper' => array(
						'class' => 'acf-hidden',
					),
				),
				array(
					'key'     => 'field_button_right_icon',
					'label'   => __( 'Right Icon', 'wsk-theme' ),
					'name'    => 'right_icon',
					'type'    => 'text',
					'wrapper' => array(
						'class' => 'acf-hidden',
					),
				),
				array(
					'key'           => 'field_button_type',
					'label'         => __( 'Type', 'wsk-theme' ),
					'name'          => 'type',
					'type'          => 'select',
					'choices'       => array(
						'primary'            => __( 'Primary', 'wsk-theme' ),
						'outline-primary'    => __( 'Outline Primary', 'wsk-theme' ),
						'secondary'          => __( 'Secondary', 'wsk-theme' ),
						'outline-secondary'  => __( 'Outline Secondary', 'wsk-theme' ),
					),
					'default_value' => 'primary',
					'return_format' => 'value',
					'wrapper'       => array(
						'class' => 'acf-hidden',
					),
				),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_button' );

/**
 * Transform the return value of the button field to fit template function requirements.
 *
 * @see wskt_get_button()
 *
 * @param mixed      $value The field value.
 * @param int|string $post_id The post ID where the value is saved.
 * @param array      $field The field array containing all settings.
 */
function wskt_transform_reusable_field_button_value( $value, $post_id, $field ) {
	// Don't transform the value in the admin section.
	if ( is_admin() ) {
		return $value;
	}

	if ( ! empty( $value['field_button_activates_modal'] ) && $value['field_button_activates_modal'] ) {
		// Use the link title as the button text.
		$value['text'] = $value['field_button_link']['title'];

		// Set the attributes appropriate for triggering the modal. TODO: Review implementation.
		$value['attributes']['data-bs-toggle'] = 'modal';
		$value['attributes']['data-bs-target'] = $value['field_button_link']['url'];
	}

	if ( ! empty( $value['field_button_link'] ) && ! $value['field_button_activates_modal'] ) {
		// Use the link title as the button text.
		$value['text'] = $value['field_button_link']['title'];

		// Set the attributes in a format suitable for the template function.
		$value['attributes']['href']   = $value['field_button_link']['url'];
		$value['attributes']['target'] = $value['field_button_link']['target'];
		$value['attributes']['title']  = $value['field_button_link']['title'];
	}

	if ( ! empty( $value['field_button_left_icon'] ) ) {
		$value['field_button_left_icon'] = wskt_get_icon(
			$value['field_button_left_icon'],
			'remix/system',
			array(
				'class' => 'btn__icon btn__icon-left',
			)
		);
	}

	if ( ! empty( $value['field_button_right_icon'] ) ) {
		$value['field_button_right_icon'] = wskt_get_icon(
			$value['field_button_right_icon'],
			'remix/system',
			array(
				'class' => 'btn__icon btn__icon-right',
			)
		);
	}

	return $value;
}
add_filter( 'acf/load_value/name=button', 'wskt_transform_reusable_field_button_value', 10, 3 );
