<?php

/**
 * Layout Template - Site Footer
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;
?>
<footer id="colophon" class="site-footer colour-scheme colour-scheme--dark layout--padding-y" role="contentinfo">
	<div class="container-fluid">

		<div id="pre-footer">
			<div class="grid">

				<div class="g-col-12 g-col-lg-6 g-col-xl-7">
					<div class="d-flex flex-column">
					</div>
				</div>

				<div class="g-col-12 g-col-lg-6 g-col-xl-5">

					<div class="container__box">
						<div class="d-flex justify-content-between">
							<span class="global__locations">Client Locations</span> <span id="ampm">AM</span>
						</div>
						<div class="clock">
							<span id="hrs">00</span>
							<span>.</span>
							<span id="min">00</span>
							<span>.</span>
							<span id="sec">00</span>
						</div>
					</div>

					<div class="container__buttons">
						<button onclick="changeLocation('Africa/Johannesburg')">Cape Town, South Africa</button>
						<button onclick="changeLocation('Europe/Lisbon')">Porto, Portugal</button>
						<button onclick="changeLocation('Asia/Dubai')">Dubai, United Emirates</button>
					</div>
				</div>

			</div>
		</div>

		<div id="main-footer">
			<div class="grid">

				<div class="g-col-12 g-col-lg-6 g-col-xl-8">
					<div class="d-flex flex-column">
						<span class="pb-5">
							<a style="text-decoration: unset;" href="<?php echo home_url(); ?>">
								<span style="font-size: 3.5rem; line-height: 3rem; color: #fff;" class="heading__black">Josh</span>
							</a>
						</span>

						<?php if (! empty($args['strapline'])) : ?>
							<small class="pb-6"><?php echo esc_attr($args['strapline']); ?></small>
						<?php endif; ?>

						<?php if (! empty($args['social_networks'])) : ?>
							<?php wskt_social_network_buttons($args['social_networks']); ?>

						<?php endif; ?>
					</div>
				</div>

				<div class="g-col-6 g-col-lg-3 g-col-xl-2">
					<?php wskt_footer_widget_area('footer-widget-area-1'); ?>
				</div>

				<div class="g-col-6 g-col-lg-3 g-col-xl-2">
					<?php wskt_footer_widget_area('footer-widget-area-2'); ?>
				</div>

			</div>
		</div>

		<hr class="break" />

		<div id="sub-footer">
			<div class="grid">

				<div class="g-col-12 g-col-lg-6">
					<?php wskt_footer_sub_menu(); ?>
				</div>

				<div class="g-col-12 g-col-lg-6">
					<div class="sub-footer__content">

						<?php if (! empty($args['copyright_details'])) : ?>
							<span class="copyright-details"><?php echo esc_attr($args['copyright_details']); ?></span>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>

	</div>
</footer>
<script>
	let hrs = document.getElementById("hrs");
	let min = document.getElementById("min");
	let sec = document.getElementById("sec");
	let ampm = document.getElementById("ampm");
	let currentTimeZone = "Africa/Johannesburg";

	function updateTime() {
		let now = new Date();
		let options = {
			timeZone: currentTimeZone,
			hour: "2-digit",
			minute: "2-digit",
			second: "2-digit",
			hour12: true,
		};

		let formatter = new Intl.DateTimeFormat("en-US", options);
		let formattedTime = formatter.formatToParts(now);

		hrs.innerHTML = formattedTime.find((part) => part.type === "hour").value;
		min.innerHTML = formattedTime.find((part) => part.type === "minute").value;
		sec.innerHTML = formattedTime.find((part) => part.type === "second").value;

		let period = formattedTime.find(part => part.type === "dayPeriod").value;
		ampm.innerHTML = period.charAt(0).toUpperCase() + period.slice(1).toLowerCase();
	}

	function changeLocation(timezone) {
		currentTimeZone = timezone;
		updateTime();
	}

	updateTime();
	setInterval(updateTime, 1000);
</script>