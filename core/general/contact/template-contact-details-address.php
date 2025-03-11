<?php
/**
 * Template Function - Contact Details - Address
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Contact Details - Address HTML.
 */
function wskt_get_contact_details_address() {
	$address = get_field( 'contact_details_address', 'option' );

	if ( empty( $address ) ) {
		return;
	}

	// Prepare the output.
	$output = '<div class="contact-details contact-details--address">';

	// Add the address.
	$output .= wp_kses( $address, 'post' );

	// Close the output.
	$output .= '</div>';

	return $output;
}

/**
 * Output the Contact Details - Address HTML.
 */
function wskt_contact_details_address() {
	echo wskt_get_contact_details_address(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
