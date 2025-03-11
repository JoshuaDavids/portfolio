<?php
/**
 * Layout Template - Map
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'map',
	'padding_variant' => 'none',

);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
	<?php if ( $args['locations'] ) : ?>
	<div class="map">
		<div class="map__markers">
			<?php foreach ( $args['locations'] as $location ) : ?>
				<div class="map__marker" data-lat="<?php echo esc_attr( $location['location']['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['location']['lng'] ); ?>">
					<?php echo esc_attr( $location['location']['city'] ); ?>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="map__frame"></div>
	</div>
	<?php endif; ?>

</section>
