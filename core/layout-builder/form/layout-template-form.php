<?php
/**
 * Layout Template - Form
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

if ( ! $args['form'] ) {
	return;
}

$layout_classes_attrs = array(
	'layout_name' => 'form',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="layout__content">

				<?php if ( $args['title'] ) : ?>
				<header class="layout__header animation animation--fade-in-up">
					<h1><?php echo esc_attr( $args['title'] ); ?></h1>
				</header>
				<?php endif; ?>

			</div>

			<div class="layout__form animation animation--fade-in-up animation--delay-4">
				<?php echo $args['form']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>

		</div>
	</div>

</section>
