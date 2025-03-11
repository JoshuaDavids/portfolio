<?php
/**
 * Template Function - Registration Form
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Registration Form HTML.
 *
 * Use a gravity forms form to allow for fast and robust form rollout and integrations.
 */
function wskt_get_registration_form() {
	$registration_form = get_field( 'registration_form', 'option' );

	if ( empty( $registration_form ) ) {
		return;
	}

	return gravity_form( $registration_form, false, false );
}

/**
 * Output the Registration Form HTML.
 *
 * @param mixed ...$args Registration Form arguments, @see wskt_get_registration_form() for a description.
 */
function wskt_registration_form( ...$args ) {
	echo wskt_get_registration_form( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
