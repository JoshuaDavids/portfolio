<?php
/**
 * Layout Template - Team Member Listing
 *
 * TODO: Move query loop to template function. WordPress loops are messy and unpredictable.
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

if ( ! $args['query']->have_posts() ) {
	return;
}

$layout_classes_attrs = array(
	'layout_name'   => 'team-member-listing',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">

		<?php if ( $args['title'] ) : ?>
		<header class="layout__header">
			<h1><?php echo esc_attr( $args['title'] ); ?></h1>
		</header>
		<?php endif; ?>

		<div class="grid">

			<?php while ( $args['query']->have_posts() ) : ?>

				<?php $args['query']->the_post(); ?>

				<?php
				$loop_item_classes = array(
					'g-col-6',
					'g-col-lg-5',
				);

				if ( 0 !== $args['query']->current_post % 2 ) {
					$loop_item_classes[] = 'g-start-lg-7';
				}
				?>

				<div class="<?php echo esc_attr( implode( ' ', $loop_item_classes ) ); ?>">
					<?php get_template_part( 'features/team/template-team-member-card' ); ?>
				</div>

			<?php endwhile; ?>

		</div>

	</div>

</section>
