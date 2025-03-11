<?php
/**
 * Layout Template - Contact
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name' => 'contact',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
	<div class="container-fluid">
		<div class="grid">
			<div class='g-col-12 g-col-md-5 g-start-md-7 g-col-lg-4 g-start-lg-8'>
				<?php echo( $args['intro'] ); ?>
			</div>
		</div>

		<div class="grid">
			<div class="g-col-12 g-col-md-5 g-col-lg-4">
				<?php wskt_contact_details( $args ); ?>

			</div>

			<div class="g-col-12 g-col-md-5 g-start-md-7 g-col-lg-4 g-start-lg-8">

				<div class="layout__form animation animation--fade-in-up animation--delay-4">
					<?php echo $args['form']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>

			</div>
		</div>

	</div>
</section>