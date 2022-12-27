<?php

/**
 * Create a Bootstrap success alert.
 *
 * @param string $message   the message content of the alert.
 *
 * @return string   the Bootstrap alert content.
 */
function createSuccessAlert(string $message): string {
	ob_start(); ?>

	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> <?= $message ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

	<?php return ob_get_clean();
}

/**
 * Create a Bootstrap error alert.
 *
 * @param string $message   the message content of the alert.
 *
 * @return string   the Bootstrap alert content.
 */
function createErrorAlert(string $message): string {
	ob_start(); ?>

	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Uh oh!</strong> <?= $message ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

	<?php return ob_get_clean();
}