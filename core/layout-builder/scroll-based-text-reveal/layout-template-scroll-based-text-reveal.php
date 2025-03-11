<?php
/**
 * Layout Template - Scroll Based Text Reveal
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'scroll-based-text-reveal',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array( 'layout--full-screen' ),
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php if ( ! empty( $args['background']['video'] ) ) : ?>
	<!-- TODO: Use Media Component -->
	<div class="layout__background media media--fill">
		<video class="layout__video" src="<?php echo esc_url( $args['background']['video'] ); ?>" playsinline="true" preload="auto" muted="muted"></video>
	</div>
	<?php endif; ?>

	<?php if ( $args['text'] ) : ?>
	<div class="layout__content">
		<div class="container-fluid">
			
			<h1 class="layout__body" data-splitting>
				<?php echo wp_kses( $args['text'], 'post' ); ?>
			</h1>

		</div>
	</div>
	<?php endif; ?>

</section>
