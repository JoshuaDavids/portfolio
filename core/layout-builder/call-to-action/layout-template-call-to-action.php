<?php
/**
 * Layout Template - Call To Action
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'call-to-action',
	'colour_scheme'   => 'dark',
	'padding_variant' => 'none',
	'classes'         => array( 'layout--full-screen' ),
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php wskt_media( $args['background'], array( 'layout__background animation animation--fade-in media--fill media--tint' ) ); ?>

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="g-col-12 g-col-md-6 g-col-lg-5">
					<div class="layout__content">

						<?php if ( $args['title'] ) : ?>
						<header class="layout__header animation animation--fade-in-up">
							<h1 class="layout__title"><?php echo esc_attr( $args['title'] ); ?></h1>
						</header>
						<?php endif; ?>

						<?php if ( $args['content'] ) : ?>
						<div class="layout__body animation animation--fade-in-up animation--delay-2">
							<?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</div>
						<?php endif; ?>

						<div class="layout__footer animation animation--fade-in animation--delay-8">
							<?php wskt_button( $args['button'] ); ?>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>

</section>
