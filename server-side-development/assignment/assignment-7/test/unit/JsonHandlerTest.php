<?php

require_once __DIR__ . '/../../src/handler/JsonHandler.php';

const jsonCollectionFilepath = __DIR__ . '/../../data/json-collection.test.json';
const jsonCollectionFilepath_invalid = 'invalid-json-collection.test.json';

const jsonUserRecordA = [ 'name' => 'Michael Muzzarelli', 'status' => 'Junior' ];
const jsonUserRecordA_update = [ 'name' => 'Michael Muzzarelli', 'status' => 'Senior' ];

const jsonUserRecordB = [ 'name' => 'Andrew Oneal', 'status' => 'Sophomore' ];

const jsonUserRecordC = [ 'name' => 'Record to Delete', 'status' => 'Senior' ];

#
# unlink collection in setup and teardown
#

beforeAll(function () {
	if (file_exists(jsonCollectionFilepath)) unlink(jsonCollectionFilepath);
});

afterAll(function () {
	if (file_exists(jsonCollectionFilepath)) unlink(jsonCollectionFilepath);
});

#
# createCollection
#

test('createCollection should create a sample collection', function () {
	JsonHandler::createCollection(jsonCollectionFilepath);

	expect(file_exists(jsonCollectionFilepath)) -> toBeTrue();
});

test('createCollection should not overwrite an existing sample collection', function () {
	$result = JsonHandler::createCollection(jsonCollectionFilepath);

	expect($result) -> toBeFalse();
});

#
# readCollection
#

test('readCollection should read sample collection and return an array', function () {
	$result = JsonHandler::readCollection(jsonCollectionFilepath);

	expect($result) -> toBeArray();
});

test('readCollection should return null when sample collection does not exist', function () {
	$result = JsonHandler::readCollection(jsonCollectionFilepath_invalid);

	expect($result) -> toBeNull();
});

#
# createRecord
#

test('createRecord should return false when collection filepath does not exist', function () {
	$result = JsonHandler::createRecord(jsonCollectionFilepath_invalid, jsonUserRecordA);

	expect($result) -> toBeFalse();
});

test('createRecord should return true when record is created in collection', function () {
	$resultA = JsonHandler::createRecord(jsonCollectionFilepath, jsonUserRecordA);
	$resultB = JsonHandler::createRecord(jsonCollectionFilepath, jsonUserRecordB);
	$resultC = JsonHandler::createRecord(jsonCollectionFilepath, jsonUserRecordC);

	expect($resultA && $resultB && $resultC) -> toBeTrue();
});

#
# readRecord
#

test('readRecord should return correct record with respect to index', function () {
	$recordA = JsonHandler::readRecord(jsonCollectionFilepath, 0);
	$recordB = JsonHandler::readRecord(jsonCollectionFilepath, 1);
	$recordC = JsonHandler::readRecord(jsonCollectionFilepath, 2);

	expect($recordA) -> toMatchArray(jsonUserRecordA);
	expect($recordB) -> toMatchArray(jsonUserRecordB);
	expect($recordC) -> toMatchArray(jsonUserRecordC);
});

test('readRecord should return null when record does not exist but collection does', function () {
	$recordA = JsonHandler::readRecord(jsonCollectionFilepath, 5);

	expect($recordA) -> toBeNull();
});

test('readRecord should return null when record and collection both do not exist', function () {
	$recordA = JsonHandler::readRecord(jsonCollectionFilepath_invalid, 0);

	expect($recordA) -> toBeNull();
});

#
# updateRecord
#

test('updateRecord should return true when update is successful', function () {
	$updateResult = JsonHandler::updateRecord(jsonCollectionFilepath, 0, jsonUserRecordA_update);
	$readResult = JsonHandler::readRecord(jsonCollectionFilepath, 0);

	expect($updateResult) -> toBeTrue();
	expect($readResult) -> toMatchArray(jsonUserRecordA_update);
});

test('updateRecord should return false when record does not exist', function () {
	$updateResult = JsonHandler::updateRecord(jsonCollectionFilepath, 5, jsonUserRecordA_update);

	expect($updateResult) -> toBeFalse();
});

#
# deleteRecord
#

test('deleteRecord should return true when deletion is successful', function () {
	$result = JsonHandler::deleteRecord(jsonCollectionFilepath, 2);

	expect($result) -> toBeTrue();
});

test('deleteRecord should return false when record does not exist', function () {
	$result = JsonHandler::deleteRecord(jsonCollectionFilepath, 5);

	expect($result) -> toBeFalse();
});