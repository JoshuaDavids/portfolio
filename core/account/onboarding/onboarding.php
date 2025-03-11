<?php
/**
 * Account : Onboarding
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Account fields to theme settings.
 *
 * @param array $fields Array of theme settings fields.
 */
function wskt_add_account_fields( $fields ) {
	$account_fields = array(
		array(
			'key'   => 'tab_account',
			'label' => __( 'Account', 'wsk-theme' ),
			'name'  => '',
			'type'  => 'tab',
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

			$account_fields[] = array(
				'key'        => 'field_account_registration_form',
				'label'      => __( 'Account Registration Form', 'wsk-theme' ),
				'name'       => 'registration_form',
				'type'       => 'select',
				'choices'    => $form_select_choices,
				'allow_null' => true,
			);

			$account_fields[] = array(
				'key'        => 'field_member_application_form',
				'label'      => __( 'Member Application Form', 'wsk-theme' ),
				'name'       => 'member_application_form',
				'type'       => 'select',
				'choices'    => $form_select_choices,
				'allow_null' => true,
			);
		}
	}

	return array_merge( $fields, $account_fields );
}
add_filter( 'wskts_theme_settings_fields', 'wskt_add_account_fields' );

/**
 * Handles ajax login requests
 */
function wskt_ajax_login() {
	// First check the nonce
	check_ajax_referer( 'ajax-login-nonce', 'security' );

	// Nonce is checked, get the POST data and sign user on
	$info                  = array();
	$info['user_login']    = isset( $_POST['username'] ) ? wp_unslash( $_POST['username'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$info['user_password'] = isset( $_POST['password'] ) ? $_POST['password'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$info['remember']      = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error( $user_signon ) ) {
		wp_send_json_error(
			array(
				'logged_in' => false,
				'message'   => __( 'Incorrect username or password.', 'wsk-theme' ),
			)
		);
	}

	wp_send_json_success(
		array(
			'logged_in' => true,
		)
	);
}
add_action( 'wp_ajax_nopriv_wskt_ajax_login', 'wskt_ajax_login' );

/**
 * Hook the Login / Registration modal into the footer
 */
add_filter( 'wp_footer', 'wskt_login_registration_modal' );

/**
 * Register "Minimal UI" templates for the account onboarding page templates.
 *
 * @param bool $is_minimal_ui Whether or not this is a Minimal UI template.
 */
function wskt_register_onboarding_templates_minimal_ui( $is_minimal_ui ) {
	$slug = get_page_template_slug();

	if ( 'page-templates/account.php' === $slug || 'page-templates/member-application.php' === $slug ) {
		$is_minimal_ui = true;
	}

	return $is_minimal_ui;
}
add_filter( 'wskt_is_minimal_ui', 'wskt_register_onboarding_templates_minimal_ui' );

/**
 * Filters the footer visibility for the account onboarding page templates.
 *
 * @param bool $enabled Whether or not the footer is enabled.
 */
function wskt_filter_onboarding_templates_footer( $enabled ) {
	$slug = get_page_template_slug();

	// Filters the footer to disable it on the "Account" Page Template for when the user is not logged in.
	if ( 'page-templates/account.php' === $slug && ! is_user_logged_in() ) {
		return false;
	}

	// Filters the footer to disable it on the "Member Application" Page Template.
	if ( 'page-templates/member-application.php' === $slug ) {
		return false;
	}

	return $enabled;
}
add_filter( 'wskt_footer_enabled', 'wskt_filter_onboarding_templates_footer' );
