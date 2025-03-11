<?php
/**
 * Template Function - Social Network Buttons
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Social Network Icon.
 *
 * @param string $social_network_key The key of the social network.
 */
function wskt_get_social_network_icon( $social_network_key ) {
	$icon_names = array(
		'twitter-x' => 'twitter-x-fill',
		'linkedin'  => 'linkedin-box-fill',
		'facebook'  => 'facebook-circle-fill',
		'instagram' => 'instagram-fill',
		'youtube'   => 'youtube-fill',
	);

	if ( array_key_exists( $social_network_key, $icon_names ) ) {
		return wskt_get_icon(
			$icon_names[ $social_network_key ],
			'remix/logos',
			array(
				'height' => 24,
				'width'  => 24,
			)
		);
	}
}

/**
 * Return the Social Network Buttons HTML.
 *
 * @param array $social_networks Array of Social Networks.
 */
function wskt_get_social_network_buttons( $social_networks = array() ) {
	if ( empty( $social_networks ) ) {
		return;
	}

	// Prepare an array to store the button data.
	$buttons = array();

	foreach ( $social_networks as $social_network ) {
		if ( empty( $social_network['url'] ) ) {
			continue;
		}

		$buttons[] = array(
			'icon'       => wskt_get_social_network_icon( $social_network['key'] ),
			'attributes' => array(
				'href'   => $social_network['url'],
				'target' => '_blank',
				'title'  => $social_network['name'],
			),
		);
	}

	$button_group = wskt_get_icon_button_group(
		$buttons,
		array(
			'classes' => array( 'btn-group-horizontal' ),
		)
	);

	return sprintf( '<div class="social-network-buttons">%1$s</div>', $button_group );
}

/**
 * Output the Social Network Buttons HTML.
 *
 * @param mixed ...$args Social Network arguments, @see wskt_get_social_network_buttons() for a description.
 */
function wskt_social_network_buttons( ...$args ) {
	echo wskt_get_social_network_buttons( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
