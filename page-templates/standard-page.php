<?php
/**
 * Template Name: Standard Page
 *
 * @package WSK_Theme
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php
			wskt_layout_page_content(
				array(
					'title'   => get_the_title(),
					'content' => get_the_content(),
				)
			);
			?>

			<?php wskt_layout_builder(); ?>

		<?php endwhile; ?>

	</main>
 
<?php
get_footer();
