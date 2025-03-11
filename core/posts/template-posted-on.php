<?php
/**
 * Template Function - Posted On
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posted On HTML.
 *
 * @param WP_Post|int $post The Post to prepare the Posted On for.
 */
function wskt_get_posted_on( $post ) {
	$time_string = sprintf(
		'<time datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C, $post ) ),
		esc_html( get_the_date( get_option( 'date_format' ), $post ) )
	);

	return sprintf( '<div class="posted-on">%1$s</div>', $time_string );
}

/**
 * Output the Posted On HTML.
 *
 * @param mixed ...$args Posted On arguments, @see wskt_get_posted_on() for a description.
 */
function wskt_posted_on( ...$args ) {
	echo wskt_get_posted_on( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
