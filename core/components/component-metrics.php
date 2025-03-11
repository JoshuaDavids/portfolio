<?php
/**
 * Component - Metrics
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Metrics HTML.
 *
 * $metric = array(
 *   'value'       => '200',
 *   'description' => 'Hours saved'
 * );
 *
 * @param array $metrics An array of Metrics.
 */
function wskt_get_metrics( $metrics = array() ) {
	if ( empty( $metrics ) ) {
		return;
	}

	$output  = '';
	$output .= '<div class="metrics animation animation--metrics">';

	foreach ( $metrics as $metric ) :
		// Prepare metric item.
		$metric_item  = '';
		$metric_item .= '<div class="metric">';
		$metric_item .= sprintf( '<h1 class="metric__value">%1$s</h1>', $metric['value'] );
		$metric_item .= sprintf( '<span class="metric__description">%1$s</span>', $metric['description'] );
		$metric_item .= '</div>';

		// Append the metric item to our output.
		$output .= $metric_item;
	endforeach;

	$output .= '</div>';

	return $output;
}

/**
 * Output the Metrics HTML.
 *
 * @param mixed ...$args Metrics arguments, @see wskt_get_metrics() for a description.
 */
function wskt_metrics( ...$args ) {
	echo wskt_get_metrics( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
