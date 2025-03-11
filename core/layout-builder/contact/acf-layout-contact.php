<?php
/**
 * ACF Layout - Contact
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_contact( $layouts ) {
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

	$layouts['layout_contact'] = array(
		'key'        => 'layout_contact',
		'label'      => __( 'Contact', 'wsk-theme' ),
		'name'       => 'contact',
		'sub_fields' => array(
         array(
            'key'   => 'field_layout_contact_intro',
            'label' => __( 'Introduction', 'wsk-theme' ),
            'name'  => 'intro',
            'type'  => 'text',
         ),
			array(
				'key'          => 'field_layout_contact_contacts',
				'label'        => __( 'Contacts', 'wsk-theme' ),
				'name'         => 'contacts',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Contact', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_contact_contact_name',
						'label' => __( 'Name', 'wsk-theme' ),
						'name'  => 'contact_name',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_layout_contact_contact_title',
						'label' => __( 'Title', 'wsk-theme' ),
						'name'  => 'contact_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_layout_contact_contact_telephone',
						'label' => __( 'Telephone', 'wsk-theme' ),
						'name'  => 'contact_telephone',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_layout_contact_contact_email',
						'label' => __( 'Email', 'wsk-theme' ),
						'name'  => 'contact_email',
						'type'  => 'email',
					),
				),
			),
			array(
				'key'        => 'field_layout_contact_form',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_contact' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_contact() {
	$attrs = array();

   $attrs['intro']         = get_sub_field( 'intro' );
   $attrs['contacts']      = get_sub_field( 'contacts' );
	$attrs['form']          = get_sub_field( 'form' );

	wskt_layout_contact( $attrs );
}
add_action( 'wskt_layout_builder_layout_contact', 'wskt_acf_layout_contact' );
