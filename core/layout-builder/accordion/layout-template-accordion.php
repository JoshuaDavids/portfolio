<?php
/**
 * Layout Template - Accordion
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'accordion',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-10">

				<div class="layout__content">
					<?php if ( $args['title'] ) : ?>
						<header class="layout__header animation animation--fade-in">
							<h1>
								<?php echo esc_attr( $args['title'] ); ?>
							</h1>
						</header>
					<?php endif; ?>
				</div>

				<?php if ( ! empty( $args['items'] ) ) : ?>
					<div class="layout__accordion">
						<?php wskt_accordion( $args['items'] ); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>

	</div>

</section>
