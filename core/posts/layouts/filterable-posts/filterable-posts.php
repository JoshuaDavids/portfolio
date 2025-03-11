<?php
/**
 * Filterable Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'layout-filterable-posts.php';

/**
 * Handles ajax filter posts requests
 */
function wskt_ajax_filter_posts() {
	// First check the nonce
	check_ajax_referer( 'filter-posts-nonce', 'security' );

	// Post type
	$info['post_type'] = isset( $_POST['post_type'] ) ? sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) : 'any';

	// Page number
	$info['page'] = isset( $_POST['page'] ) ? sanitize_text_field( wp_unslash( $_POST['page'] ) ) : '1';

	// Sorting
	$info['order'] = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : 'DESC';

	// Search based
	$info['search_term'] = isset( $_POST['search_term'] ) ? sanitize_text_field( wp_unslash( $_POST['search_term'] ) ) : '';

	// Taxonomy based
	$info['terms'] = isset( $_POST['terms'] ) ? map_deep( wp_unslash( $_POST['terms'] ), 'sanitize_text_field' ) : array();

	// Templating
	$info['posts_template'] = isset( $_POST['posts_template'] ) ? sanitize_text_field( wp_unslash( $_POST['posts_template'] ) ) : 'grid';

	// Prepare query arguments
	$query_args = array(
		'post_type'   => $info['post_type'],
		'post_status' => 'publish',
	);

	// Add page query
	if ( ! empty( $info['page'] ) ) {
		$query_args['paged'] = $info['page'];
	}

	if ( ! empty( $info['order'] ) ) {
		$query_args['order'] = $info['order'];
	}

	// Add search query
	if ( ! empty( $info['search_term'] ) ) {
		$query_args['s'] = $info['search_term'];
	}

	// Prepare Taxonomy query
	if ( ! empty( $info['terms'] ) ) {
		// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $info['terms'],
			),
		);
	}

	$query = new WP_Query( $query_args );

	$args = array();

	$args['posts']        = wp_list_pluck( $query->posts, 'ID' );
	$args['current_page'] = $query->query_vars['paged'];
	$args['max_pages']    = $query->max_num_pages;
	$args['found_posts']  = $query->found_posts;

	wp_reset_postdata();

	$args['post_type']      = $info['post_type'];
	$args['order']          = $info['order'];
	$args['search_term']    = $info['search_term'];
	$args['posts_template'] = $info['posts_template'];

	ob_start();
	wskt_layout_filterable_posts( $args );
	$output = ob_get_clean();

	wp_send_json_success(
		array(
			'html' => $output,
			'args' => $query_args,
		)
	);
}
add_action( 'wp_ajax_wskt_ajax_filter_posts', 'wskt_ajax_filter_posts' );
add_action( 'wp_ajax_nopriv_wskt_ajax_filter_posts', 'wskt_ajax_filter_posts' );
