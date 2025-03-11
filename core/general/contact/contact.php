<?php
/**
 * Contact
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Templates
 */
require_once 'template-contact-details-address.php';
require_once 'template-contact-details-email.php';
require_once 'template-contact-details-phone-number.php';
require_once 'template-contact-form.php';
require_once 'template-contact-modal.php';

/**
 * Add Contact fields to theme settings.
 *
 * @param array $fields Array of theme settings fields.
 */
function wskt_add_contact_fields( $fields ) {
	$new_fields = array(
		array(
			'key'   => 'tab_contact',
			'label' => __( 'Contact', 'wsk-theme' ),
			'name'  => '',
			'type'  => 'tab',
		),
		array(
			'key'           => 'field_contact_contact_page',
			'label'         => __( 'Contact Page', 'wsk-theme' ),
			'name'          => 'contact_page',
			'type'          => 'post_object',
			'post_type'     => array( 'page' ),
			'return_format' => 'id',
		),
	);

	if ( class_exists( 'GFAPI' ) ) {
		$forms = GFAPI::get_forms();

		// Don't add the form field if there are no forms available.
		if ( $forms ) {
			// Prepare the list of available forms to choose from.
			$form_select_choices = array();
			foreach ( $forms as $form ) {
				$form_select_choices[ $form['id'] ] = $form['title'];
			}

			$new_fields[] = array(
				'key'        => 'field_account_contact_form',
				'label'      => __( 'Contact Form', 'wsk-theme' ),
				'name'       => 'contact_form',
				'type'       => 'select',
				'choices'    => $form_select_choices,
				'allow_null' => true,
			);
		}
	}

	return array_merge( $fields, $new_fields );
}
add_filter( 'wskts_theme_settings_fields', 'wskt_add_contact_fields' );

/**
 * Hook the Contact Modal into the footer
 */
add_filter( 'wp_footer', 'wskt_contact_modal' );
