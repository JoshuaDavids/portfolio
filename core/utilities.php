<?php
/**
 * Utilities
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Check for whether the site is in production.
 */
function wskt_is_production() {
	if ( 'production' === wp_get_environment_type() ) {
		return true;
	}

	return false;
}

/**
 * Merges two arrays of classes and clean them up
 *
 * @param array $existing Array of existing classes.
 * @param array $additional Array of additional classes.
 */
function wskt_merge_classes( $existing, $additional ) {
	if ( empty( $additional ) ) {
		return $existing;
	}

	$merged = array();
	$merged = array_merge( $existing, $additional );
	$merged = array_unique( $merged );
	$merged = array_filter( $merged );

	return $merged;
}

/**
 * Implode and escape HTML attributes for output.
 *
 * @param array $raw_attrs Attribute name value pairs.
 */
function wskt_implode_html_attributes( $raw_attrs = array() ) {
	if ( empty( $raw_attrs ) ) {
		return '';
	}

	$attrs = array();
	foreach ( $raw_attrs as $name => $value ) {
		$value   = ( 'href' === $name ) ? esc_url( $value ) : esc_attr( $value );
		$attrs[] = esc_attr( $name ) . '="' . esc_attr( $value ) . '"';
	}

	return implode( ' ', $attrs );
}

/**
 * Return the attrs array without the wrapping array with the specified selector.
 *
 * In:
 * -----
 *
 * $attrs = array(
 *   'button' => array(
 *     'text' => 'Click Here'
 *   )
 * );
 *
 * Out:
 * -----
 *
 * $attrs = array(
 *   'text' => 'Click Here'
 * );
 *
 * @param string $selector The field name or key.
 * @param array  $field The field to unwrap.
 */
function wskt_unwrap_attrs( $selector, $field = array() ) {
	if ( isset( $field[ $selector ] ) ) {
		$field = $field[ $selector ];
	}

	return $field;
}

/**
 * Returns a "time ago" string for the specified date time.
 *
 * @param string $datetime Datetime string.
 * @param bool   $full Display full output.
 */
function wskt_time_elapsed_string( $datetime, $full = false ) {
	$now  = new DateTime();
	$ago  = new DateTime( $datetime );
	$diff = $now->diff( $ago );

	$diff->w  = floor( $diff->d / 7 );
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ( $string as $k => &$v ) {
		if ( $diff->$k ) {
			$v = $diff->$k . ' ' . $v . ( $diff->$k > 1 ? 's' : '' );
		} else {
			unset( $string[ $k ] );
		}
	}

	if ( ! $full ) {
		$string = array_slice( $string, 0, 1 );
	}

	$output = $string ? sprintf(
		'<strong>%1$s</strong> %2$s',
		implode( ', ', $string ),
		esc_attr__( 'ago', 'wsk-theme' )
	) : sprintf(
		'<strong>%1$s</strong>',
		esc_attr__( 'just now', 'wsk-theme' )
	);

	echo wp_kses( $output, 'post' );
}

/**
 * Returns the current page url.
 */
function wskt_get_current_url() {
	global $wp;
	return home_url( add_query_arg( array(), $wp->request ) );
}

/**
 * Returns the value of a nested key in an array.
 *
 * @param array $array The array to find the nested key value from
 * @param array $keys Array of nested key values
 */
function wskt_get_nested_array_value( $array, $keys ) {
	foreach ( $keys as $key ) {
		if ( isset( $array[ $key ] ) ) {
			$array = $array[ $key ];
		} else {
			return null;
		}
	}

	return $array;
}

/**
 * Returns the Top Level Parent for a given post id
 *
 * @param int $post_id Post ID to retrieve the Top Level Parent for.
 */
function wskt_get_top_level_post( $post_id ) {
	$post = get_post( $post_id );

	if ( $post->post_parent ) {
		$ancestors = get_post_ancestors( $post->ID );
		$root      = count( $ancestors ) - 1;
		$parent    = $ancestors[ $root ];
	} else {
		$parent = $post->ID;
	}

	return $parent;
}
