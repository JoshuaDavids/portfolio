<?php
/**
 * Roles
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Utility function for checking whether the current user in an administrator.
 */
function wskt_is_site_admin() {
	return current_user_can( 'manage_options' );
}

/**
 * Removes the WordPress admin bar for non-admin roles.
 */
function wskt_remove_admin_bar() {
	if ( ! wskt_is_site_admin() && ! is_admin() ) {
		show_admin_bar( false );
	}
}
add_action( 'after_setup_theme', 'wskt_remove_admin_bar' );
