<?php
/**
 * Gutenberg
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable Gutenberg block editor for all post types.
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * Disable Gutenberg block editor for widgets.
 */
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Disable loading of Gutenberg related stylesheets.
 */
function wskt_dequeue_gutenberg_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', 'wskt_dequeue_gutenberg_styles', 100 );
