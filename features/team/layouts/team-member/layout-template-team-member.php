<?php
/**
 * Layout Template - Team Member
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;


if ( ! $args ) {
	return;
}


$layout_classes_attrs = array(
	'layout_name'   => 'team-member',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
	<div class="container-fluid">

		<div class="row">

			<div class="col--media col-md-5 animation animation--fade-in-up">
				<?php
				wskt_media(
					$args['media']
				);
				?>

				<?php wskt_social_network_buttons( $args['social_networks'] ); ?>
			</div>

			<div class="col--content col-md-5 offset-md-1 animation animation--fade-in animation--delay-4">

				<div class="layout__content">
				<?php if ( ! empty( $args['title'] ) ) : ?>
						<h1>
							<?php echo esc_attr( $args['title'] ); ?>
						</h1>
					<?php endif; ?>

					<?php if ( ! empty( $args['bio'] ) ) : ?>
						<?php echo $args['bio'];  // phpcs:ignore WordPress.Security.EscapeOutput ?>
					<?php endif; ?>
				</div>

			</div>

		</div>

	</div>
</section>
