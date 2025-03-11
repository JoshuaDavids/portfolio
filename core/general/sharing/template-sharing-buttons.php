<?php
/**
 * Template Function - Sharing Buttons
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output the Sharing Buttons HTML.
 *
 * @param array $attrs Sharing Buttons attributes.
 */
function wskt_get_sharing_buttons( $attrs = array() ) {
	$default_attrs = array(
		'btn-group-classes' => array( 'btn-group-horizontal' ),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$buttons_data = array(
		array(
			'key'  => 'facebook',
			'url'  => add_query_arg(
				array(
					'fbrefresh' => true,
					'u'         => rawurlencode( get_permalink() ),
				),
				'https://www.facebook.com/sharer/sharer.php'
			),
			'name' => 'Facebook',
		),
		array(
			'key'  => 'twitter-x',
			'url'  => add_query_arg(
				array(
					'text' => get_the_title() . ' ' . rawurlencode( get_permalink() ),
				),
				'https://twitter.com/intent/tweet'
			),
			'name' => 'Twitter',
		),
		array(
			'key'  => 'linkedin',
			'url'  => add_query_arg(
				array(
					'url' => get_permalink( get_the_ID() ),
				),
				'http://www.linkedin.com/sharing/share-offsite/'
			),
			'name' => 'LinkedIn',
		),
	);

	// Prepare an array to store the button data.
	$buttons = array();

	foreach ( $buttons_data as $button ) {
		if ( empty( $button['url'] ) ) {
			continue;
		}

		$buttons[] = array(
			'icon'       => wskt_get_social_network_icon( $button['key'] ),
			'attributes' => array(
				'href'   => $button['url'],
				'target' => '_blank',
				'title'  => $button['name'],
			),
			'classes'    => array( 'btn-icon-only' ),
		);
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default button group class.
	$classes[] = 'btn-group';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['btn-group-classes'] );

	return sprintf(
		'<div class="sharing-buttons">%1$s</div>',
		wskt_get_icon_button_group(
			$buttons,
			array(
				'classes' => $classes,
			)
		)
	);
}

/**
 * Output the Sharing Buttons HTML.
 *
 * @param mixed ...$args Sharing Buttons arguments, @see wskt_get_sharing_buttons() for a description.
 */
function wskt_sharing_buttons( ...$args ) {
	echo wskt_get_sharing_buttons( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
