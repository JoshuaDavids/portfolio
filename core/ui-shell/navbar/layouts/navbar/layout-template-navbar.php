<?php

/**
 * Layout Template - Navbar
 *
 * TODO: Decouple from data and make re-usable.
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$default_classes = array(
	'navbar',
	'navbar-expand-xl',
	'navbar-transparent',
);

$classes = apply_filters('wskt_navbar_classes', $default_classes);
?>

<nav class="<?php echo esc_attr(implode(' ', $classes)); ?>">

	<div class="container-fluid">

		<main class="nav">
			<div class="logo">
				<a style="text-decoration: unset;" href="<?php echo home_url(); ?>">
					<span style="font-size: 3.5rem; line-height: 3rem; color: #fff;" class="heading__black">Josh</span>
				</a>
			</div>
			<div class="menu-open-btn">Menu</div>
		</main>

	</div>

</nav>


<div class="menu-overlay">
	<div class="container-fluid">
		<div class="menu-nav">
			<div class="menu-logo">
				<a style="text-decoration: unset;" href="<?php echo home_url(); ?>">
					<span style="font-size: 3.5rem; line-height: 3rem; color: #fff;" class="heading__black">Josh</span>
				</a>
			</div>
			<div class="menu-close-btn">Close</div>
		</div>
		<div class="menu-cols">
			<div class="col">
				<div class="video">
					<div class="video-preview"></div>
					<div class="video-details">
						<p>
							<i class="ph-fill ph-play-circle"></i>Get in touch
						</p>
						<p>- ❤️ -</p>
					</div>
				</div>
			</div>
			<div class="col">
				<?php
				$menu_name = 'header';
				$menu = wp_get_nav_menu_object($menu_name);

				if ($menu) {
					$menu_items = wp_get_nav_menu_items($menu->term_id);

					if ($menu_items) {
						foreach ($menu_items as $link) : ?>
							<div class="menu-link">
								<a href="<?php echo esc_url($link->url); ?>"><?php echo esc_html($link->title); ?></a>
							</div>
				<?php endforeach;
					}
				}
				?>
			</div>
		</div>
		<div class="menu-footer">
			<div class="menu-divider"></div>
			<div class="menu-footer-copy">
				<div class="slogan">
					<p>From code to concept; always pushing forward.</p>
				</div>
				<div class="socials">
					<a target="_blank" href="https://www.linkedin.com/in/joshuacalebdavids/">LinkedIn</a>
					<a target="_blank" href="https://www.instagram.com/_onlycaleb/">Instagram</a>
					<a target="_blank" href="https://github.com/JoshuaDavids">Github</a>
					<a target="_blank" href="https://codepen.io/joshuacalebdavids">Codepen</a>
				</div>
			</div>
		</div>
	</div>
</div>