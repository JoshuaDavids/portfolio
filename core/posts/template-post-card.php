<?php
/**
 * Template Function - Post Card
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Post Card HTML.
 *
 * @param WP_Post|int $post The Post to prepare a card for.
 */
function wskt_get_post_card( $post ) {
	if ( ! $post ) {
		return;
	}

	$body  = '';
	$body .= sprintf(
		'<div class="card-sub-header">%1$s</div>',
		wskt_get_posted_on( $post )
	);
	$body .= sprintf(
		'<h5 class="card-title"><a href="%1$s" class="link-muted">%2$s</a></h5>',
		get_the_permalink( $post ),
		get_the_title( $post )
	);
	$body .= sprintf(
		'<div class="card-excerpt">%1$s</div>',
		wp_trim_words( get_the_excerpt( $post ), 12 )
	);

	$footer  = '';
	$footer .= wskt_get_button(
		array(
			'type' => 'primary',
			'url'  => get_the_permalink( $post ),
			'text' => __( 'Read More', 'wsk-theme' ),
		)
	);

	return wskt_get_card(
		array(
			'type'      => 'blank',
			'media_top' => sprintf(
				'<a href="%1$s">%2$s</a>',
				get_the_permalink( $post ),
				wskt_get_post_thumbnail(
					$post,
					array(
						'ratio'    => 'ratio-5x4',
						'fallback' => true,
					)
				),
			),
			'body'      => $body,
			'footer'    => $footer,
		)
	);
}

/**
 * Output the Post Card HTML.
 *
 * @param mixed ...$args Post Card arguments, @see wskt_get_post_card() for a description.
 */
function wskt_post_card( ...$args ) {
	echo wskt_get_post_card( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
