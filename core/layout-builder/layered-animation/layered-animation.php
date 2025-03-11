<?php
/**
 * Layered Animation
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'acf-layout-layered-animation.php';
require_once 'layout-layered-animation.php';

/**
 * Register Minimal UI Layout.
 *
 * @param array $layouts Minimal UI Layouts.
 */
function wskt_register_layered_animation_minimal_ui_layout( $layouts ) {
	$layouts[] = 'layered_animation';

	return $layouts;
}
add_filter( 'wskt_minimal_ui_layouts', 'wskt_register_layered_animation_minimal_ui_layout' );

/**
 * Enqueue scripts.
 */
function wskt_layout_layered_animation_scripts() {
	// Register and enqueue script if not already enqueued.
	if ( ! wp_script_is( 'lottie-scripts', 'enqueued' ) ) {
		wp_register_script( 'lottie-scripts', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array( 'jquery' ), '4.1.0', false );

		wp_enqueue_script( 'lottie-scripts' );
	}
}
add_action( 'wp_enqueue_scripts', 'wskt_layout_layered_animation_scripts' );
