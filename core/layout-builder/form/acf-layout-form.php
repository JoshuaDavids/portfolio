<?php
/**
 * ACF Layout - Form
 *
 * TODO: Decouple from gravity forms.
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_form( $layouts ) {
	if ( ! class_exists( 'GFAPI' ) ) {
		return $layouts;
	}

	$forms = GFAPI::get_forms();

	// Don't enable the layout if there are no forms available.
	if ( ! $forms ) {
		return $layouts;
	}

	// Prepare the list of available forms to choose from.
	$form_select_choices = array();
	foreach ( $forms as $form ) {
		$form_select_choices[ $form['id'] ] = $form['title'];
	}

	$layouts['layout_form'] = array(
		'key'        => 'layout_form',
		'label'      => __( 'Form', 'wsk-theme' ),
		'name'       => 'form',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_form_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'        => 'field_layout_form_form',
				'label'      => __( 'Form', 'wsk-theme' ),
				'name'       => 'form',
				'type'       => 'select',
				'choices'    => $form_select_choices,
				'allow_null' => true,
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_form' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_form() {
	$attrs = array();

	$attrs['title']          = get_sub_field( 'title' );
	$attrs['form']           = gravity_form(
		get_sub_field( 'form' ),
		$display_title       = false,
		$display_description = false,
		$display_inactive    = false,
		$field_values        = null,
		$ajax                = true,
		$tabindex            = null,
		$echo                = false
	);

	wskt_layout_form( $attrs );
}
add_action( 'wskt_layout_builder_layout_form', 'wskt_acf_layout_form' );
