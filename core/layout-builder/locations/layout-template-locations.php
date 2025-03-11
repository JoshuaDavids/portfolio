<?php
/**
 * Layout Template - Locations
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name' => 'split-content',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<?php if ( $args['intro'] ) : ?>
				<div class="g-col-12 g-col-md-5">
					<div class="layout__intro">
						<?php echo wp_kses( $args['intro'], 'post' ); ?>
					</div>
				</div>
				<?php endif; ?>

				<div class="g-col-12 g-col-md-7">
					<div class="layout__content">

						<?php if ( $args['content'] ) : ?>
						<div class="layout__body animation">
							<?php echo wp_kses( $args['content'], 'post' ); ?>
						</div>
						<?php endif; ?>

					</div>
				</div>

			</div>

		</div>
	</div>

</section>
