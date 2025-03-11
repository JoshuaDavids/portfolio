<?php
/**
 * The search template file
 *
 * @package WSK_Theme
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php
		wskt_layout_search_header(
			array(
				'content' => wskt_get_search_form(
					array(
						'placeholder' => esc_attr__( 'Search by title', 'wsk-theme' ),
					)
				),
			)
		);
		?>

		<?php
		wskt_layout_search_navbar(
			array(
				'links' => wskt_get_search_navbar_links(),
			)
		);
		?>

		<?php wskt_layout_search_content(); ?>

	</main>

<?php
get_footer();
