<?php
/**
 * Reusable fields - Testimonial
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Testimonial.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_testimonial( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_testimonial',
			'label'      => __( 'Testimonial', 'wsk-theme' ),
			'name'       => 'testimonial',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'           => 'field_testimonial_image',
					'label'         => __( 'Image', 'wsk-theme' ),
					'name'          => 'image',
					'type'          => 'image',
					'return_format' => 'id',
					'wrapper'       => array(
						'class' => 'acf-hidden',
					),
				),
				array(
					'key'          => 'field_testimonial_quote',
					'label'        => __( 'Quote', 'wsk-theme' ),
					'name'         => 'quote',
					'type'         => 'wysiwyg',
					'media_upload' => 0,
					'delay'        => 1,
				),
				array(
					'key'   => 'field_testimonial_name',
					'label' => __( 'Name', 'wsk-theme' ),
					'name'  => 'name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_testimonial_role',
					'label' => __( 'Role', 'wsk-theme' ),
					'name'  => 'role',
					'type'  => 'text',
				),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_testimonial' );
