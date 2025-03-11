<?php
/**
 * Template Function - Contact Details - Email
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Contact Details - Email HTML.
 */
function wskt_get_contact_details_email() {
	$email = get_field( 'contact_details_email', 'option' );

	if ( empty( $email ) ) {
		return;
	}

	// Prepare the output.
	$output = '<div class="contact-details contact-details--email">';

	// Add the email link.
	$output .= sprintf(
		'<a href="mailto:%1$s" class="link-muted">%1$s</a>',
		esc_attr( $email )
	);

	// Close the output.
	$output .= '</div>';

	return $output;
}

/**
 * Output the Contact Details - Email HTML.
 */
function wskt_contact_details_email() {
	echo wskt_get_contact_details_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
