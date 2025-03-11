<?php
/**
 * Template Function - Contact Modal
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Contact Modal HTML.
 */
function wskt_get_contact_modal() {
	ob_start();
	?>

	<div id="contact-modal" class="modal fade colour-scheme" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">Close</button>
				</div>

				<div class="modal-body">
					<?php wskt_contact_form(); ?>
				</div>

			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

/**
 * Output the Contact Modal HTML.
 *
 * @param mixed ...$args Contact Modal arguments, @see wskt_get_contact_modal() for a description.
 */
function wskt_contact_modal( ...$args ) {
	echo wskt_get_contact_modal( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
