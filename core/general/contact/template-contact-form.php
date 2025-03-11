<?php
/**
 * Template Function - Contact Form
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Contact Form HTML.
 *
 * Use a gravity forms form to allow for fast and robust form rollout and integrations.
 */
function wskt_get_contact_form() {
	$contact_form = get_field( 'contact_form', 'option' );

	if ( empty( $contact_form ) ) {
		return;
	}

	return gravity_form(
		$contact_form,
		$display_title       = true,
		$display_description = true,
		$display_inactive    = false,
		$field_values        = null,
		$ajax                = true,
		$tabindex            = 0,
		$echo                = false
	);
}

/**
 * Output the Contact Form HTML.
 *
 * @param mixed ...$args Contact Form arguments, @see wskt_get_contact_form() for a description.
 */
function wskt_contact_form( ...$args ) {
	echo wskt_get_contact_form( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
