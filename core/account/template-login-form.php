<?php
/**
 * Template Function - Login Form
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Login Form HTML.
 */
function wskt_get_login_form() {
	ob_start();
	?>

	<form id="login" action="login" method="post">
		<div class="form__body">
			<div class="form-field">
				<label for="username" class="form-label">
					<?php esc_attr_e( 'Username', 'wsk-theme' ); ?>
				</label>

				<div class="form-control-container">
					<input id="username" class="form-control" name="username" placeholder="<?php esc_attr_e( 'Enter your username', 'wsk-theme' ); ?>" type="text" />
				</div>
			</div>

			<div class="form-field">
				<label for="password" class="form-label">
					<?php esc_attr_e( 'Password', 'wsk-theme' ); ?>
				</label>

				<div class="form-control-container">
					<input id="password" class="form-control" name="password" placeholder="<?php esc_attr_e( 'Enter your password', 'wsk-theme' ); ?>" type="password" />

					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="ms-auto">
						<?php esc_attr_e( 'Forgotten password?', 'wsk-theme' ); ?>
					</a>
				</div>
			</div>

			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		</div>

		<div class="form__footer">
			<button class="btn btn-primary btn-block" type="submit">
				<?php esc_attr_e( 'Log in', 'wsk-theme' ); ?>
			</button>
		</div>

	</form>

	<?php
	return ob_get_clean();
}

/**
 * Output the Login Form HTML.
 *
 * @param mixed ...$args Login Form arguments, @see wskt_get_login_form() for a description.
 */
function wskt_login_form( ...$args ) {
	echo wskt_get_login_form( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
