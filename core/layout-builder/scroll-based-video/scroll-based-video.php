<?php
/**
 * Scroll Based Video
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'acf-layout-scroll-based-video.php';
require_once 'layout-scroll-based-video.php';

/**
 * Register Minimal UI Layout.
 *
 * @param array $layouts Minimal UI Layouts.
 */
function wskt_register_scroll_based_video_minimal_ui_layout( $layouts ) {
	$layouts[] = 'scroll_based_video';

	return $layouts;
}
add_filter( 'wskt_minimal_ui_layouts', 'wskt_register_scroll_based_video_minimal_ui_layout' );
