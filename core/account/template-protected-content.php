<?php
/**
 * Template Function - Protected Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Protected Content HTML.
 */
function wskt_get_protected_content() {
	$output = '';

	if ( is_user_logged_in() ) {
		$output .= apply_filters( 'the_content', get_the_content() );
	} else {
		$output .= apply_filters( 'the_content', wp_trim_words( get_the_content(), 150 ) );

		$output .= '<div class="protected-content__guard">';
		$output .= wskt_get_login_registration_form();
		$output .= '</div>';
	}

	return $output;
}

/**
 * Output the Protected Content HTML.
 *
 * @param mixed ...$args Protected Content arguments, @see wskt_get_protected_content() for a description.
 */
function wskt_protected_content( ...$args ) {
	echo wskt_get_protected_content( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
