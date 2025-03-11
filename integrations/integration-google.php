<?php
/**
 * Integration - Google
 *
 * @package WSK_Theme/Integrations
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Google Analytics Tracking script.
 *
 * TODO: Add field in site admin area.
 */
function wskt_add_ga_tracking_script() {
	if ( wskt_is_production() ) :
		?>

		<!-- Google tag (gtag.js) -->
		<?php // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript ?>

		<?php
	endif;
}
add_action( 'wskt_head_start', 'wskt_add_ga_tracking_script' );
