<?php
/**
 * UI Shell
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

require_once 'navbar/navbar.php';
require_once 'navigation/navigation.php';
require_once 'sidebar/sidebar.php';
require_once 'site-footer/site-footer.php';
require_once 'site-header/site-header.php';

require_once 'minimal-ui.php';

/**
 * Action for inserting immediately after the opening <head> tag.
 */
function wskt_head_start() {
	/**
	 * Fires the wskt_head_start action.
	 */
	do_action( 'wskt_head_start' );
}

/**
 * Action for inserting immediately before the closing </head> tag.
 */
function wskt_head_end() {
	/**
	 * Fires the wskt_head_end action.
	 */
	do_action( 'wskt_head_end' );
}

/**
 * Action for inserting immediately after the opening <body> tag.
 */
function wskt_body_start() {
	/**
	 * Fires the wskt_body_start action.
	 */
	do_action( 'wskt_body_start' );
}

/**
 * Action for inserting immediately before the closing </body> tag.
 */
function wskt_body_end() {
	/**
	 * Fires the wskt_body_end action.
	 */
	do_action( 'wskt_body_end' );
}
