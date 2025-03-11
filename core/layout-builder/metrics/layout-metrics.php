<?php
/**
 * Layout - Metrics
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_metrics( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'metrics'       => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/metrics/layout-template-metrics',
		null,
		$args
	);
}
