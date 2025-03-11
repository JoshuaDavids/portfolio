<?php
/**
 * Layout Template - Testimonial
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'testimonial',
	'padding_variant' => 'wide',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="g-col-12 g-col-md-10 g-start-md-2 g-col-lg-8 g-start-lg-3">

					<?php wskt_blockquote( $args['testimonial'] ); ?>

				</div>

			</div>

		</div>
	</div>

</section>
