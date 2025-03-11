<?php
/**
 * ACF Layout - Testimonial
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_testimonial( $layouts ) {
	$layouts['layout_testimonial'] = array(
		'key'        => 'layout_testimonial',
		'label'      => __( 'Testimonial', 'wsk-theme' ),
		'name'       => 'testimonial',
		'sub_fields' => array(
			array(
				'key'     => 'field_layout_testimonial_testimonial',
				'label'   => __( 'Testimonial', 'wsk-theme' ),
				'name'    => 'testimonial',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_testimonial',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_testimonial' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_testimonial() {
	$attrs = array();

	$attrs['testimonial'] = get_sub_field( 'testimonial' );

	// Add additional blockquote classes.
	$attrs['testimonial']['classes'] = array( 'blockquote--centered' );

	wskt_layout_testimonial( $attrs );
}
add_action( 'wskt_layout_builder_layout_testimonial', 'wskt_acf_layout_testimonial' );
