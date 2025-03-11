<?php
/**
 * Layout Template - Header
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'header',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="g-col-12 g-col-md-8">

					<div class="layout__content">

						<header class="layout__header">
							<?php wskt_breadcrumbs(); ?>

							<?php if ( $args['title'] ) : ?>
								<h1><?php echo wp_kses( $args['title'], 'post' ); ?></h1>
							<?php endif; ?>
						</header>

					</div>

				</div>

			</div>

		</div>
	</div>

</section>
