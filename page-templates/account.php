<?php
/**
 * Template Name: Account
 *
 * @package WSK_Theme
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php if ( is_user_logged_in() ) : ?>

				<div class="account">

					<?php wskt_layout_builder(); ?>

					<div class="layout layout--padding-y">

						<div class="container-fluid">
							<?php wskt_login_logout_button(); ?>
						</div>

					</div>

				</div>

			<?php else : ?>

				<div class="panel-group">

					<div class="panel-group__panel">
						<div class="container-fluid">
							<?php wskt_login_registration_form(); ?>
						</div>
					</div>

					<div class="panel-group__hero">

					</div>

				</div>

			<?php endif; ?>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
