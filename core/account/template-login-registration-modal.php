<?php
/**
 * Template Function - Login / Registration Modal
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Login / Registration Modal HTML.
 */
function wskt_get_login_registration_modal() {
	ob_start();
	?>

	<div class="modal fade" id="login-registration-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<?php wskt_login_registration_form(); ?>
				</div>

			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

/**
 * Output the Login / Registration Modal HTML.
 *
 * @param mixed ...$args Login / Registration Modal arguments, @see wskt_get_login_registration_modal() for a description.
 */
function wskt_login_registration_modal( ...$args ) {
	echo wskt_get_login_registration_modal( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
