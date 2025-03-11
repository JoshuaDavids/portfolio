<?php
/**
 * Component - Price
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Price HTML.
 *
 * Formats a price string with a currency symbol.
 *
 * @param float $price The raw price.
 * @param array $args (optional) Arguments to format a price.
 */
function wskt_get_price( $price, $args = array() ) {
	$args = apply_filters(
		'wskt_price_args',
		wp_parse_args(
			$args,
			array(
				'currency_symbol'    => '£',
				'decimal_separator'  => '.',
				'thousand_separator' => ',',
				'decimals'           => 2,
			)
		)
	);

	// Cast the price to a float.
	$price = (float) $price;

	$price = number_format(
		$price,
		$args['decimals'],
		$args['decimal_separator'],
		$args['thousand_separator']
	);

	return sprintf( '<span class="price">%1$s%2$s</span>', $args['currency_symbol'], $price );
}

/**
 * Output the Price HTML.
 *
 * @param mixed ...$args Price arguments, @see wskt_get_price() for a description.
 */
function wskt_price( ...$args ) {
	echo wskt_get_price( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
