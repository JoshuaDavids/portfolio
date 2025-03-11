<?php
/**
 * Reusable Fields - Decoration
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Decoration.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_decoration( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_decoration',
			'label'      => __( 'Decoration', 'wsk-theme' ),
			'name'       => 'decoration',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'        => 'field_decoration_variant',
					'label'      => __( 'Variant', 'wsk-theme' ),
					'name'       => 'variant',
					'type'       => 'select',
					'choices'    => array(
						'style-1' => 'Style 1',
						'style-2' => 'Style 2',
					),
					'allow_null' => true,
				),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_decoration' );
