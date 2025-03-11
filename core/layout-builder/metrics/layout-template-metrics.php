<?php
/**
 * Layout Template - Metrics
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'metrics',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="g-col-12 g-col-lg-4">
					<?php if ( $args['title'] ) : ?>
					<header class="layout__header">
						<h3 class="layout__title"><?php echo esc_attr( $args['title'] ); ?></h3>
					</header>
					<?php endif; ?>
				</div>

				<div class="g-col-12 g-col-lg-8">
					<div class="layout__metrics animation animation--metrics">
						<?php wskt_metrics( $args['metrics'] ); ?>
					</div>
				</div>

			</div>

		</div>
	</div>

</section>
