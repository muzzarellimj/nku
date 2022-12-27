<?php

require_once __DIR__ . '/../../src/handler/CsvHandler.php';

const csvCollectionFilepath = __DIR__ . '/../../data/csv-collection.test.csv';
const csvCollectionFilepath_invalid = 'invalid-csv-collection.test.csv';

const csvUserRecordA = [ 'Michael Muzzarelli', 'Junior' ];
const csvUserRecordA_update = [ 'Michael Muzzarelli', 'Senior' ];

const csvUserRecordB = [ 'Andrew Oneal', 'Sophomore' ];

const csvUserRecordC = [ 'Record to Delete', 'Senior' ];

#
# unlink collection in setup and teardown
#

beforeAll(function () {
	if (file_exists(csvCollectionFilepath)) unlink(csvCollectionFilepath);
});

afterAll(function () {
	if (file_exists(csvCollectionFilepath)) unlink(csvCollectionFilepath);
});

#
# createCollection
#

test('createCollection should create a sample collection', function () {
	CsvHandler::createCollection(csvCollectionFilepath);

	expect(file_exists(csvCollectionFilepath)) -> toBeTrue();
});

test('createCollection should not overwrite an existing sample collection', function () {
	$result = CsvHandler::createCollection(csvCollectionFilepath);

	expect($result) -> toBeFalse();
});

#
# readCollection
#

test('readCollection should read sample collection and return an array', function () {
	$result = CsvHandler::readCollection(csvCollectionFilepath);

	expect($result) -> toBeArray();
});

test('readCollection should return null when sample collection does not exist', function () {
	$result = CsvHandler::readCollection(csvCollectionFilepath_invalid);

	expect($result) -> toBeNull();
});

#
# createRecord
#

test('createRecord should return true when a record is created', function () {
	$resultA = CsvHandler::createRecord(csvCollectionFilepath, csvUserRecordA);
	$resultB = CsvHandler::createRecord(csvCollectionFilepath, csvUserRecordB);
	$resultC = CsvHandler::createRecord(csvCollectionFilepath, csvUserRecordC);

	expect($resultA && $resultB && $resultC) -> toBeTrue();
});

test('createRecord should return false when collection does not exist', function () {
	$result = CsvHandler::createRecord(csvCollectionFilepath_invalid, csvUserRecordA);

	expect($result) -> toBeFalse();
});

test('createRecord should return false when record is invalid', function () {
	$result = CsvHandler::createRecord(csvCollectionFilepath, [ ]);

	expect($result) -> toBeFalse();
});


#
# readRecord
#

test('readRecord should return correct record with respect to index', function () {
	$recordA = CsvHandler::readRecord(csvCollectionFilepath, 1);
	$recordB = CsvHandler::readRecord(csvCollectionFilepath, 2);
	$recordC = CsvHandler::readRecord(csvCollectionFilepath, 3);

	expect($recordA) -> toMatchArray(csvUserRecordA);
	expect($recordB) -> toMatchArray(csvUserRecordB);
	expect($recordC) -> toMatchArray(csvUserRecordC);
});

test('readRecord should return null when record does not exist but collection does', function () {
	$recordA = CsvHandler::readRecord(csvCollectionFilepath, 10);

	expect($recordA) -> toBeNull();
});

test('readRecord should return null when record and collection both do not exist', function () {
	$recordA = CsvHandler::readRecord(csvCollectionFilepath_invalid, 0);

	expect($recordA) -> toBeNull();
});

#
# updateRecord
#

test('updateRecord should return true when update is successful', function () {
	$updateResult = CsvHandler::updateRecord(csvCollectionFilepath, 1, csvUserRecordA_update);
	$readResult = CsvHandler::readRecord(csvCollectionFilepath, 1);

	expect($updateResult) -> toBeTrue();
	expect($readResult) -> toMatchArray(csvUserRecordA_update);
});

test('updateRecord should return false when record does not exist', function () {
	$updateResult = CsvHandler::updateRecord(csvCollectionFilepath, 10, csvUserRecordA_update);

	expect($updateResult) -> toBeFalse();
});

#
# deleteRecord
#

test('deleteRecord should return true when deletion is successful', function () {
	$result = CsvHandler::deleteRecord(csvCollectionFilepath, 3);

	expect($result) -> toBeTrue();
});

test('deleteRecord should return false when record does not exist', function () {
	$result = CsvHandler::deleteRecord(csvCollectionFilepath, 10);

	expect($result) -> toBeFalse();
});