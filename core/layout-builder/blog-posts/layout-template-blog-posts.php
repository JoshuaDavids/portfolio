<?php

/**
 * Layout Template - Hero
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'blog-posts',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array('layout--next-layout-preview'),
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">
		<div class="layout__inner">
			<?php if ($args['title']) : ?>
				<header class="layout__header animation animation--fade-in-up">
					<h2 class="heading__black"><?php echo $args['title']; ?></h2>
				</header>
			<?php endif; ?>

			<div class="grid">

				<?php foreach ($args['posts'] as $single_post) : ?>

					<article class="card__article g-col-4">
						<img src="<?php echo get_the_post_thumbnail_url($single_post); ?>" alt="image" class="card__img">

						<div class="card__data">
							<span class="card__description"><?php echo get_the_date('F j, Y'); ?></span>
							<h2 class="card__title"><?php echo get_the_title($single_post); ?></h2>
							<a href="<?php echo get_permalink($single_post); ?>" class="card__button">Read More</a>
						</div>
					</article>

				<?php endforeach; ?>


			</div>
		</div>
	</div>

</section>