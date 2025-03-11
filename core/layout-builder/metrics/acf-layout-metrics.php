<?php
/**
 * ACF Layout - Metrics
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_metrics( $layouts ) {
	$layouts['layout_metrics'] = array(
		'key'        => 'layout_metrics',
		'label'      => __( 'Metrics', 'wsk-theme' ),
		'name'       => 'metrics',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_metrics_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_metrics_metrics',
				'label'        => __( 'Metrics', 'wsk-theme' ),
				'name'         => 'metrics',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Metric', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'     => 'field_layout_metrics_metric_value',
						'label'   => __( 'Value', 'wsk-theme' ),
						'name'    => 'value',
						'type'    => 'text',
					),
					array(
						'key'   => 'field_layout_metrics_metric_description',
						'label' => __( 'Description', 'wsk-theme' ),
						'name'  => 'description',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'     => 'field_layout_metrics_colour_scheme',
				'label'   => __( 'Colour Scheme', 'wsk-theme' ),
				'name'    => 'colour_scheme',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_colour_scheme',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_metrics' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_metrics() {
	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['metrics']       = get_sub_field( 'metrics' );
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_metrics( $attrs );
}
add_action( 'wskt_layout_builder_layout_metrics', 'wskt_acf_layout_metrics' );
