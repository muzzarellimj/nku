<?php

require_once __DIR__ . '/../../src/authentication/AuthenticationHandler.php';
require_once __DIR__ . '/../../src/collection/CsvCollection.php';

const authenticationHandlerTest_activeAccountCollectionFilepath = __DIR__ . '/../../data/account.csv.php';
const authenticationHandlerTest_bannedAccountCollectionFilepath = __DIR__ . '/../../data/banned.csv.php';

const authenticationHandlerTest_activeAccountCollection_initialContent = '<?php die (\'active account collection should not be accessed in an executable context\') ?>' . PHP_EOL;
const authenticationHandlerTest_bannedAccountCollection_initialContent = '<?php die (\'banned account collection should not be accessed in an executable context\') ?>' . PHP_EOL . 'banned@foo.com,foo$bar%' . PHP_EOL;

#
# populate initial collection file content in setup
#

beforeAll(function () {
	$activeAccountCollection = fopen(authenticationHandlerTest_activeAccountCollectionFilepath, 'w') or die ('AuthenticationHandlerTest setup could not open active account collection output filestream');
	$bannedAccountCollection = fopen(authenticationHandlerTest_bannedAccountCollectionFilepath, 'w') or die ('AuthenticationHandlerTest setup could not open banned account collection output filestream');

	fwrite($activeAccountCollection, authenticationHandlerTest_activeAccountCollection_initialContent);
	fwrite($bannedAccountCollection, authenticationHandlerTest_bannedAccountCollection_initialContent);

	fclose($activeAccountCollection);
	fclose($bannedAccountCollection);
});

#
# register
#

test('register should return true when registration is successful', function () {
	$registerResult = AuthenticationHandler::register('foo@bar.com', 'foo$bar%');

	expect($registerResult) -> toBeTrue();
});

test('register should return false when account already exists', function () {
	$registerResult = AuthenticationHandler::register('foo@bar.com', 'foo$bar%');

	expect($registerResult) -> toBeFalse();
});

test('register should return false when account is banned', function () {
	$registerResult = AuthenticationHandler::register('banned@foo.com', 'foo$bar%');

	expect($registerResult) -> toBeFalse();
});

test('register should return false when email is not in appropriate format', function () {
	$registerResult = AuthenticationHandler::register('foobar', 'foo$bar%');

	expect($registerResult) -> toBeFalse();
});

test('register should return false when password is not an appropriate length', function () {
	$registerResult = AuthenticationHandler::register('foo@bar.com', 'foobar');

	expect($registerResult) -> toBeFalse();
});

test('register should return false when password does not include two special characters', function () {
	$registerResult = AuthenticationHandler::register('foo@bar.com', 'foobar-foobar');

	expect($registerResult) -> toBeFalse();
});

#
# authenticate
#

test('authenticate should return false when email is not in appropriate format', function () {
	$result = AuthenticationHandler::authenticate('foobar', 'foo$bar%');

	expect($result) -> toBeFalse();
});

test('authenticate should return false when password is not an appropriate length', function () {
	$result = AuthenticationHandler::authenticate('foobar', 'foobar');

	expect($result) -> toBeFalse();
});

test('authenticate should return false when account is banned', function () {
	$result = AuthenticationHandler::authenticate('banned@foo.com', 'foo$bar%');

	expect($result) -> toBeFalse();
});

test('authenticate should return false when password does not match stored password hash', function () {
	$result = AuthenticationHandler::authenticate('foo@bar.com', 'foo$bar%foo');

	expect($result) -> toBeFalse();
});

test('authenticate should return true when authentication is successful', function () {
	$result = AuthenticationHandler::authenticate('foo@bar.com', 'foo$bar%');

	expect($result) -> toBeTrue();
});

#
# midpoint test to evaluate session authentication status
#

test('post-authentication: session authentication status should be accessible and return true', function () {
	expect(AuthenticationHandler::isAuthenticated()) -> toBeTrue();
});

#
# createSessionAttribute
#

test('createSessionAttribute should return false when attribute or value are invalid', function () {
	$noAttributeResult = AuthenticationHandler::createSessionAttribute('', 'value');
	$noValueResult = AuthenticationHandler::createSessionAttribute('attribute', '');

	expect($noAttributeResult) -> toBeFalse();
	expect($noValueResult) -> toBeFalse();
});

test('createSessionAttribute should return true when attribute is created and stored', function () {
	$result = AuthenticationHandler::createSessionAttribute('role', 'moderator');

	expect($result) -> toBeTrue();
});

#
# readSessionAttribute
#

test('readSessionAttribute should return null when attribute is invalid', function () {
	$result = AuthenticationHandler::readSessionAttribute('');

	expect($result) -> toBeNull();
});

test('readSessionAttribute should return null when attribute does not exist', function () {
	$result = AuthenticationHandler::readSessionAttribute('doesNotExist');

	expect($result) -> toBeNull();
});

test('readSessionAttribute should return appropriate value when attribute exists', function () {
	$result = AuthenticationHandler::readSessionAttribute('role');

	expect($result) -> toEqual('moderator');
});

#
# deauthenticate
#

test('post-deauthentication: session authentication status should be accessible and return false', function () {
	AuthenticationHandler::deauthenticate();

	expect(AuthenticationHandler::isAuthenticated()) -> toBeFalse();
});