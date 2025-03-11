<?php
/**
 * Page Utils
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Top Level Page for a given id
 *
 * @param int $id Page ID to retrieve the Top Level Parent for.
 */
function wskt_get_top_level_page( $id ) {
	$post = get_post( $id );

	if ( $post->post_parent ) {
		$ancestors = get_post_ancestors( $post->ID );
		$root      = count( $ancestors ) - 1;
		$parent    = $ancestors[ $root ];
	} else {
		$parent = $post->ID;
	}

	return $parent;
}
