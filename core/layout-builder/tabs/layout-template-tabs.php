<?php
/**
 * Layout Template - Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $args['tabs'] ) ) {
	return;
}


$layout_classes_attrs = array(
	'layout_name'   => 'tabs',
	'colour_scheme' => $args['colour_scheme'],
);

// UUID for tabs so that we don't run into issues when more than one tab layout is used on the same page.
$uuid = uniqid();
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="row">

			<div class="col-md-10">

				<ul class="nav nav-tabs" id="<?php sprintf( 'tabs-%1$s', $uuid ); ?>" role="tablist">
				<?php foreach ( $args['tabs'] as $index => $tab_item ) : ?>
					<li class="nav-item" role="presentation">
						<button
							class="<?php echo 0 === $index ? 'nav-link active' : 'nav-link'; ?>"
							id="<?php printf( 'tabs-%1$s-%2$s-tab', esc_attr( $uuid ), esc_attr( $index ) ); ?>"
							data-bs-toggle="tab"
							data-bs-target="<?php printf( '#tabs-%1$s-%2$s', esc_attr( $uuid ), esc_attr( $index ) ); ?>"
							type="button"
							role="tab"
							aria-selected="<?php 0 === $index; ?>"
						>
							<?php echo esc_attr( $tab_item['title'] ); ?>
						</button>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content" id="<?php sprintf( 'tabs-%1$s-content', esc_attr( $uuid ) ); ?>">
				<?php foreach ( $args['tabs'] as $index => $tab_item ) : ?>
					<div
						class="<?php echo 0 === $index ? 'tab-pane fade show active' : 'tab-pane fade'; ?>"
						id="<?php printf( 'tabs-%1$s-%2$s', esc_attr( $uuid ), esc_attr( $index ) ); ?>"
						role="tabpanel"
					>

						<div class="layout_content">

							<?php if ( $tab_item['title'] ) : ?>
								<h2>
									<?php echo esc_attr( $tab_item['title'] ); ?>
								</h2>
							<?php endif; ?>

							<?php if ( $tab_item['content'] ) : ?>
								<?php echo $tab_item['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<?php endif; ?>

							<?php wskt_button( $tab_item['button'] ); ?>

						</div>

					</div>

					<?php endforeach; ?>
				</div>

			</div>

		</div>
	</div>

</section>
