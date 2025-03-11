<?php
/**
 * Layout Template - Accordion Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'accordion-media',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">

		<div class="grid">

			<div class="g-col-12 g-col-md-5">
				<div class="layout__content">
					<?php if ( $args['title'] ) : ?>
						<header class="layout__header animation animation--fade-in">
							<h1 class="layout__title">
								<?php echo esc_attr( $args['title'] ); ?>
							</h1>
						</header>
					<?php endif; ?>
				</div>

				<?php if ( ! empty( $args['items'] ) ) : ?>
					<div class="layout__accordion">
						<?php
						wskt_accordion(
							$args['items'],
							array(
								'classes' => array( 'accordion--bordered' ),
							)
						);
						?>
					</div>
            </div>
            
				<?php endif; ?>
            <div class="g-col-12 g-col-md-6 g-start-md-7 col--media">
               <?php if ( ! empty( $args['items'] ) ) : ?>
                  <?php foreach ( $args['items'] as $index => $item ) : ?>
                     <div class="layout__media layout__media--<?php echo $index; ?><?php echo $index === 0 ? ' layout__media--active' : ''; ?>">
                        <?php wskt_media( $item['media'], array( 'media--fill' ) ); ?>
                     </div>
                  <?php endforeach; ?>
               <?php endif; ?>
            </div>

		</div>

	</div>

</section>
