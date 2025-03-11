<?php
/**
 * Layout Template - Split Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'split-content',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<?php if ( $args['title'] ) : ?>
			<header class="layout__header animation animation--fade-in-up">
				<h1><?php echo esc_attr( $args['title'] ); ?></h1>
			</header>
			<?php endif; ?>

			<div class="grid">

				<?php if ( $args['intro'] ) : ?>
				<div class="g-col-12 g-col-md-5">
					<div class="layout__intro animation animation--fade-in-up animation--delay-2">
						<?php echo do_shortcode( $args['intro'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					</div>
				</div>
				<?php endif; ?>

				<div class="g-col-12 g-col-md-7">
					<div class="layout__content">

						<?php if ( $args['content'] ) : ?>
						<div class="layout__body animation animation--fade-in-up animation--delay-4">
							<?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</div>
						<?php endif; ?>

						<footer class="layout__footer animation animation--fade-in-up animation--delay-6">
							<?php wskt_button( $args['button'] ); ?>
						</footer>

					</div>
				</div>

			</div>

		</div>
	</div>

</section>
