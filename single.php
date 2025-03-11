<?php
/**
 * Template for a Single Post
 *
 * @package WSK_Theme
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php
			wskt_layout_post_content(
				array(
					'title'   => get_the_title(),
					'content' => apply_filters( 'the_content', get_the_content() ),
				)
			);
			?>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
