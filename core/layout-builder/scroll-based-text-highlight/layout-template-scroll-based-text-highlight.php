<?php
/**
 * Layout Template - Scroll Based Text Highlight
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'scroll-based-text-highlight',
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
			
			<div class="layout__body">
			<?php
			$parts = str_split( $args['text'] );

			$wrapped_parts = array_map(
				function ( $part ) {
					return sprintf(
						'<span class="layout__text-item">%1$s</span>',
						$part
					);
				},
				$parts
			);

			echo wp_kses( implode( '', $wrapped_parts ), 'post' );
			?>
			</div>

		</div>
	</div>
	<?php endif; ?>

</section>
