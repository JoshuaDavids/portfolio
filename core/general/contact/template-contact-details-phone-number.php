<?php
/**
 * Template Function - Contact Details - Phone Number
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Contact Details - Phone Number HTML.
 */
function wskt_get_contact_details_phone_number() {
	$phone_number = get_field( 'contact_details_phone_number', 'option' );

	if ( empty( $phone_number ) ) {
		return;
	}

	// Prepare the output.
	$output = '<div class="contact-details contact-details--phone-number">';

	// Add the phone link.
	$output .= sprintf(
		'<a href="tel:%1$s" class="link-muted">%1$s</a>',
		esc_attr( $phone_number )
	);

	// Close the output.
	$output .= '</div>';

	return $output;
}

/**
 * Output the Contact Details - Phone Number HTML.
 */
function wskt_contact_details_phone_number() {
	echo wskt_get_contact_details_phone_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
