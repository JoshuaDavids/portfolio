<?php
/**
 * Integration - Comments
 *
 * @package WSK_Theme/Integrations
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove comments from the backend, and do not allow access to the pages
 */
function wskt_remove_comments_from_backend() {
	global $pagenow;

	if ( 'edit-comments.php' === $pagenow ) {
		wp_safe_redirect( admin_url() );
		exit;
	}

	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

	foreach ( get_post_types() as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}
add_action( 'admin_init', 'wskt_remove_comments_from_backend' );

/**
 * Close comments on the frontend
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

/**
 * Hide any existing comments
 */
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

/**
 * Remove the comments page from the admin menu
 */
function wskt_remove_comments_page_from_admin_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'wskt_remove_comments_page_from_admin_menu' );

/**
 * Hide comments from the admin bar
 */
function wskt_hide_comments_from_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'wskt_hide_comments_from_admin_bar' );
