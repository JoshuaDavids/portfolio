<?php
/**
 * Reusable Fields - Colour Scheme
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Colour Scheme.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_colour_scheme( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_colour_scheme',
			'label'      => __( 'Colour Scheme', 'wsk-theme' ),
			'name'       => 'colour_scheme',
			'type'       => 'select',
			'choices'    => array(
				'default'    => __( 'Default', 'wsk-theme' ),
				'light'      => __( 'Light', 'wsk-theme' ),
				'dark'       => __( 'Dark', 'wsk-theme' ),
				'primary'    => __( 'Primary', 'wsk-theme' ),
				'secondary'  => __( 'Secondary', 'wsk-theme' ),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_colour_scheme' );
