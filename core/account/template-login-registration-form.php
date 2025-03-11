<?php
/**
 * Template Function - Login / Registration Form
 *
 * Displays a toggle able UI that switches between login and registration forms.
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Login / Registration Form HTML.
 */
function wskt_get_login_registration_form() {
	ob_start();
	?>

	<div class="login-registration-form">

		<div class="login-registration-form__form" data-form="login" aria-expanded="true">
			<?php wskt_login_form(); ?>

			<div class="login-registration-form__actions">
				<div class="me-3">
					<?php esc_attr_e( 'Not a member?', 'wsk-theme' ); ?>

					<a href="#" data-wsk-toggle="login-registration-form" data-toggle-target="registration">
						<?php esc_attr_e( 'Create an account', 'wsk-theme' ); ?>
					</a>
				</div>
			</div>
		</div>

		<div class="login-registration-form__form" data-form="registration" aria-expanded="false">
			<?php wskt_registration_form(); ?>

			<div class="login-registration-form__actions">
				<div>
					<?php esc_attr_e( 'Already a member?', 'wsk-theme' ); ?>

					<a href="#" data-wsk-toggle="login-registration-form" data-toggle-target="login">
						<?php esc_attr_e( 'Log in', 'wsk-theme' ); ?>
					</a>
				</div>
			</div>
		</div>

	</div>

	<?php
	return ob_get_clean();
}

/**
 * Output the Login / Registration Form HTML.
 *
 * @param mixed ...$args Login / Registration Form arguments, @see wskt_get_login_registration_form() for a description.
 */
function wskt_login_registration_form( ...$args ) {
	echo wskt_get_login_registration_form( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
