<?php
/**
 * Template Function - Login / Logout Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Login / Logout Button HTML.
 *
 * @param array $attrs Button attributes.
 */
function wskt_get_login_logout_button( $attrs = array() ) {
	$default_attrs = array(
		'enable_supporting_text' => false,
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$args = array();

	if ( is_user_logged_in() ) {
		if ( $attrs['enable_supporting_text'] ) {
			$current_user            = wp_get_current_user();
			$args['supporting_text'] = $current_user->user_email;
		}

		$args['button'] = array(
			'type' => 'primary',
			'size' => 'sm',
			'text' => esc_attr__( 'Log out', 'wsk-theme' ),
			'url'  => wp_logout_url( wskt_get_current_url() ),
		);
	} else {
		$args['button'] = array(
			'type'       => 'primary',
			'size'       => 'sm',
			'text'       => esc_attr__( 'Log in', 'wsk-theme' ),
			'attributes' => array(
				'data-bs-toggle' => 'modal',
				'data-bs-target' => '#login-registration-modal',
			),
		);
	}

	$output  = '';
	$output .= '<div class="login-logout-button">';

	if ( ! empty( $args['supporting_text'] ) ) :
		$output .= sprintf(
			'<span class="login-logout-button__supporting-text me-4">%1$s</span>',
			esc_attr( $args['supporting_text'] )
		);
	endif;

	$output .= wskt_get_button( $args['button'] );

	$output .= '</div>';

	return $output;
}

/**
 * Output the Login / Logout Button HTML.
 *
 * @param mixed ...$args Login / Logout Button arguments, @see wskt_get_login_logout_button() for a description.
 */
function wskt_login_logout_button( ...$args ) {
	echo wskt_get_login_logout_button( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
