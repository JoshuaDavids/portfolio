<?php
/**
 * Map
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'acf-layout-map.php';
require_once 'layout-map.php';

/**
 * Enqueue scripts.
 */
function wskt_layout_map_scripts() {
	if ( ! class_exists( 'WSKTS_Google_Maps' ) ) {
		return;
	}

	$api_key = WSKTS_Google_Maps::get_google_maps_api_key();

	// Register and enqueue script if not already enqueued.
	if ( ! wp_script_is( 'wskts-script-google-maps', 'enqueued' ) ) {
		wp_register_script( 'wskts-script-google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $api_key, array(), '1', true );

		wp_enqueue_script( 'wskts-script-google-maps' );
	}
}
add_action( 'wp_enqueue_scripts', 'wskt_layout_map_scripts' );
