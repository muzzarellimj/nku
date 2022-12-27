<?php

require_once __DIR__ . '/../collection/CsvCollection.php';
require_once __DIR__ . '/../utility/Utility.php';

/**
 * An authentication handler meant to contain CSV-appropriate authentication functions.
 *
 * @author Michael Muzzarelli
 */
class AuthenticationHandler {

	/**
	 * Validate an email address and password and ensure account registration to the active account collection.
	 *
	 * @param string $email     the account email address.
	 * @param string $password  the account password.
	 *
	 * @return bool     true when registration is successful, false otherwise.
	 */
	public static function register(string $email, string $password): bool {
		# error check: email and password should be valid
		if (!$email || !$password) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# error check: email should be in appropriate format
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# error check: password should be between 8 and 16 characters
		if (strlen($password) < 8 || strlen($password) > 16) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# error check: password should contain at least two special characters
		if (preg_match_all('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $password) < 2) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# initialise banned account collection
		$bannedAccountCollection = new CsvCollection('banned');

		# append '.php' to banned account collection filepath
		$bannedAccountCollection -> filepath = $bannedAccountCollection -> filepath . '.php';

		# check banned account collection existence
		if (file_exists($bannedAccountCollection -> filepath)) {
			# read banned account collection content
			$bannedAccounts = $bannedAccountCollection -> readCollection();

			# fail when $email is in $bannedAccounts
			if (Utility::in_array_r($email, $bannedAccounts)) {
				echo 'Your account has been banned - please contact support for further assistance.';

				return false;
			}
		}

		# initialise active account collection
		$activeAccountCollection = new CsvCollection('account');

		# append '.php' to active account collection filepath
		$activeAccountCollection -> filepath = $activeAccountCollection -> filepath . '.php';

		# check active account collection existence
		if (file_exists($activeAccountCollection -> filepath)) {
			# read active account collection content
			$activeAccounts = $activeAccountCollection -> readCollection();

			# fail when $email is in $activeAccounts
			if (Utility::in_array_r($email, $activeAccounts)) {
				echo 'Your account has already been created - please sign in.';

				return false;
			}
		}

		# compute password hash in preparation to store
		$hash = password_hash($password, PASSWORD_DEFAULT);

		# create record in active account collection
		$createResult = $activeAccountCollection -> createRecord([ $email, $hash ]);

		# error check: $createResult should be true
		if (!$createResult) {
			echo 'An error occurred in registration - please try again.';

			return false;
		}

		return true;
	}

	/**
	 * Validate an email address and password and evaluate password match with stored password hash to authenticate.
	 *
	 * @param string $email     the account email address.
	 * @param string $password  the account password.
	 *
	 * @return bool     true when registration is successful, false otherwise.
	 */
	public static function authenticate(string $email, string $password): bool {
		# error check: email and password should be valid
		if (!$email || !$password) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# error check: email should be in appropriate format
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# error check: password should be between 8 and 16 characters
		if (strlen($password) < 8 || strlen($password) > 16) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# initialise banned account collection
		$bannedAccountCollection = new CsvCollection('banned');

		# append '.php' to banned account collection filepath
		$bannedAccountCollection -> filepath = $bannedAccountCollection -> filepath . '.php';

		# check banned account collection existence
		if (file_exists($bannedAccountCollection -> filepath)) {
			# read banned account collection content
			$bannedAccounts = $bannedAccountCollection -> readCollection();

			# fail when $email is in $bannedAccounts
			if (Utility::in_array_r($email, $bannedAccounts)) {
				echo 'Your account has been banned - please contact support for further assistance.';

				return false;
			}
		}

		# initialise active account collection
		$activeAccountCollection = new CsvCollection('account');

		# append '.php' to active account collection filepath
		$activeAccountCollection -> filepath = $activeAccountCollection -> filepath . '.php';

		# check active account collection existence
		if (file_exists($activeAccountCollection -> filepath)) {
			# read active account collection content
			$activeAccounts = $activeAccountCollection -> readCollection();

			# search active collection to find $email
			$account = Utility::array_search_r($email, $activeAccounts);

			# fail when $email is not in $activeAccounts
			if ($account === null) {
				echo 'Please enter a valid email address and password.';

				return false;
			}
		}

		# evaluate password matches stored password hash and fail when it does not
		if (!password_verify($password, $account[1])) {
			echo 'Please enter a valid email address and password.';

			return false;
		}

		# start session to store user session data
		session_start();

		# store session authentication status
		$_SESSION['authentication'] = true;

		return true;
	}

	/**
	 * Deauthenticate an account and indicate so in the session (and lack of one post-deauthentication).
	 */
	public static function deauthenticate(): void {
		# store session authentication status
		$_SESSION['authentication'] = false;

		# destroy session data
		session_destroy();
	}

	/**
	 * Create and store a session attribute.
	 *
	 * @param string $attribute     the attribute name, e.g., authentication.
	 * @param string $value         the attribute value, e.g., true.
	 *
	 * @return bool     true when attribute is created and stored, false otherwise.
	 */
	public static function createSessionAttribute(string $attribute, string $value): bool {
		# error check: $attribute and $value should be valid
		if (!$attribute || !$value) return false;

		# store session attribute
		$_SESSION[$attribute] = $value;

		return true;
	}

	/**
	 * Read a session attribute value.
	 *
	 * @param string $attribute     the attribute name, e.g., authentication.
	 *
	 * @return mixed    the attribute value when present, null otherwise.
	 */
	public static function readSessionAttribute(string $attribute): mixed {
		# error check: session should be valid
		if (!$_SESSION) return null;

		# error check: $attribute should be valid
		if (!$attribute) return null;

		# error check: $_SESSION[$attribute] should exist
		if (!isset($_SESSION[$attribute])) return null;

		return $_SESSION[$attribute];
	}

	/**
	 * Convenience function to semantically check authentication status.
	 *
	 * @return bool     true when the session is authenticated, false otherwise.
	 */
	public static function isAuthenticated(): bool {
		# store authentication attribute value
		$status = self::readSessionAttribute('authentication');

		# return status when it is a boolean and coalesce false when it is not
		return $status ?? false;
	}
}