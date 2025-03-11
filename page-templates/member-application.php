<?php
/**
 * Template Name: Member Application
 *
 * @package WSK_Theme
 */

get_header();

$member_application_form = get_field( 'member_application_form', 'option' );
?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<div class="panel-group">

				<div class="panel-group__panel panel-group__panel--wide">
					<div class="container-fluid">

						<?php if ( ! empty( $member_application_form ) ) : ?>
							<?php echo gravity_form( $member_application_form, false, false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php endif; ?>

					</div>
				</div>

				<div class="panel-group__hero">

				</div>

			</div>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
