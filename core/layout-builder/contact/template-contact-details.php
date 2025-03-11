<?php
/**
 * Template Function - Contact Details
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the contact Details HTML.
 *
 * @param array $attrs Contact Details attributes.
 */
function wskt_get_contact_details( $attrs = array() ) {
	$default_attrs = array(
		'contacts' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	if ( empty( $attrs['contacts'] ) ) {
		return;
	}

	$output  = '';
	$output .= '<div class="container-fluid">';
	$output .= sprintf(
		'<h2>%1$s</h2>',
		esc_attr__( 'Contacts', 'wsk-theme' )
	);
	$output .= '<div class="contacts">';
	foreach ( $attrs['contacts'] as $index => $contact ) {
		$output .= '<div class="contact pt-4">';

		if ( $contact['contact_name'] ) {
			$output .= sprintf(
				'<h4 class="contact__name"><strong>%1$s</strong></h4>',
				$contact['contact_name'],
			);
		}

		if ( $contact['contact_title'] ) {
			$output .= sprintf(
				'<span class="contact__title text-uppercase text-small text-muted">%1$s</span>',
				$contact['contact_title'],
			);
		}
      
      if ( $contact['contact_email'] ) {
         $output .= sprintf(
            '<div class="contact__email pt-4"><a href="mailto:%1$s" class="link-muted text-icon">%2$s%1$s</a></div>',
            esc_attr( $contact['contact_email'] ),
            wskt_get_icon(
               'mail-01',
               'wsk'
            ),
         );
      }

		if ( $contact['contact_telephone'] ) {
			// Add the phone link.
			$output .= sprintf(
				'<div class="contact__telephone"><a href="tel:%1$s" class="link-muted text-icon">%2$s%1$s</a></div>',
				esc_attr( $contact['contact_telephone'] ),
				wskt_get_icon(
					'phone',
					'wsk'
				),
			);
		}

		$output .= '</div>';
	}
	$output .= '</div>';
	$output .= '</div>';

	return sprintf( '<div class="contact-details">%1$s</div>', $output );
}

/**
 * Output the contact Details HTML.
 *
 * @param mixed ...$args contact Details arguments, @see wskt_get_contact_details() for a description.
 */
function wskt_contact_details( ...$args ) {
	echo wskt_get_contact_details( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
