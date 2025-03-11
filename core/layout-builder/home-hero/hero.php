<?php
/**
 * Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'acf-layout-hero.php';
require_once 'layout-hero.php';

/**
 * Register Minimal UI Layout.
 *
 * @param array $layouts Minimal UI Layouts.
 */
function wskt_register_hero_minimal_ui_layout( $layouts ) {
	$layouts[] = 'hero';

	return $layouts;
}
// add_filter( 'wskt_minimal_ui_layouts', 'wskt_register_hero_minimal_ui_layout' );
