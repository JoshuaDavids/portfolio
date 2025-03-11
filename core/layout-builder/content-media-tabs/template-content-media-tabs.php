<?php
/**
 * Template Function - Content Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Content / Media Tabs HTML.
 *
 * @param array $content_media_tabs An array of Content / Media Tabs.
 */
function wskt_get_content_media_tabs( $content_media_tabs = array() ) {
	if ( empty( $content_media_tabs ) ) {
		return;
	}

	$tabs = array();

	// Transform the Content / Media Tabs data into a shape that the Tabs Template function Expects.
	foreach ( $content_media_tabs as $index => $tab ) :
		// Prepare tab content.
		$tab_content  = '';
		$tab_content .= '<div class="grid">';

		$tab_content .= '<div class="g-col-12 g-col-md-5 g-col-lg-4">';
		if ( $tab['content'] ) {
			$tab_content .= '<div class="tab-pane__content">';
			$tab_content .= apply_filters( 'the_content', $tab['content'] );
			$tab_content .= '</div>';
		}

		if ( $tab['button'] ) {
			$tab_content .= '<div class="tab-pane__footer">';
			$tab_content .= wskt_get_button( $tab['button'] );
			$tab_content .= '</div>';
		}
		$tab_content .= '</div>';

		if ( $tab['ratio_media'] ) {
			$tab_content .= '<div class="g-col-12 g-col-md-7 g-start-lg-6">';
			$tab_content .= wskt_get_media( $tab['ratio_media'] );
			$tab_content .= '</div>';
		}

		$tab_content .= '</div>';

		$tabs[] = array(
			'id'      => $index,
			'title'   => $tab['title'],
			'content' => $tab_content,
		);
	endforeach;

	return wskt_tabs( $tabs );
}

/**
 * Output the Content / Media Tabs HTML.
 *
 * @param mixed ...$args Content / Media Tabs arguments, @see wskt_get_content_media_tabs() for a description.
 */
function wskt_content_media_tabs( ...$args ) {
	echo wskt_get_content_media_tabs( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
