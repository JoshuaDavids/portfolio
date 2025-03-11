<?php
/**
 * Layout Template - Cross Scrolling Images
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'cross-scrolling-images',
	'padding_variant' => 'none',
	'colour_scheme'   => 'none',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="animation-wrapper">
		<?php foreach ( $args['images'] as $image ) : ?>

			<?php
			if ( ! $image['image'] ) {
				continue;
			}

			$classes = array();

			$classes[] = 'cross-scrolling-image';

			// Add scroll direction modifier class.
			if ( ! empty( $image['scroll_direction'] ) ) {
				$classes[] = sprintf( 'cross-scrolling-image--%1$s', $image['scroll_direction'] );
			}

			// Prepare html attributes
			$html_attrs['class'] = implode( ' ', $classes );

			$attributes = wskt_implode_html_attributes( $html_attrs );

			// Prepare output.
			$output  = '';
			$output .= sprintf( '<div %1$s>', $attributes );
			$output .= wp_get_attachment_image( $image['image'], 'full' );
			$output .= '</div>';

			echo wp_kses( $output, 'post' );
			?>

		<?php endforeach; ?>
	</div>

</section>
