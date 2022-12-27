<?php

require_once __DIR__ . '/../../src/collection/CsvCollection.php';

const csvCollectionTest_userCollection = new CsvCollection('user');

const csvCollectionTest_userRecordA = [ 'Michael Muzzarelli', 'Junior' ];
const csvCollectionTest_userRecordA_update = [ 'Michael Muzzarelli', 'Senior' ];

const csvCollectionTest_userRecordB = [ 'Andrew Oneal', 'Sophomore' ];

const csvCollectionTest_userRecordC = [ 'Record to Delete', 'Senior' ];

#
# unlink collection in setup and teardown
#

beforeAll(function () {
	$filepath = csvCollectionTest_userCollection -> filepath;

	if (file_exists($filepath)) unlink($filepath);
});

afterAll(function () {
	$filepath = csvCollectionTest_userCollection -> filepath;

	if (file_exists($filepath)) unlink($filepath);
});

#
# createCollection
#

test('createCollection should create CSV collection file when one does not exist', function () {
	csvCollectionTest_userCollection -> createCollection();

	expect(file_exists(csvCollectionTest_userCollection -> filepath)) -> toBeTrue();
});

test('createCollection should fail to create CSV collection file when one does exist', function () {
	$result = csvCollectionTest_userCollection -> createCollection();

	expect($result) -> toBeFalse();
});

#
# readCollection
#

test('readCollection should read a sample collection and return an array', function () {
	$result = csvCollectionTest_userCollection -> readCollection();

	expect($result) -> toBeArray();
});

#
# createRecord
#

test('createRecord should return true when record is created in collection', function () {
	$resultA = csvCollectionTest_userCollection -> createRecord(csvCollectionTest_userRecordA);
	$resultB = csvCollectionTest_userCollection -> createRecord(csvCollectionTest_userRecordB);
	$resultC = csvCollectionTest_userCollection -> createRecord(csvCollectionTest_userRecordC);

	expect($resultA && $resultB && $resultC) -> toBeTrue();
});

#
# readRecord
#

test('readRecord should return correct record with respect to index', function () {
	$resultA = csvCollectionTest_userCollection -> readRecord(1);
	$resultB = csvCollectionTest_userCollection -> readRecord(2);
	$resultC = csvCollectionTest_userCollection -> readRecord(3);

	expect($resultA) -> toMatchArray(csvCollectionTest_userRecordA);
	expect($resultB) -> toMatchArray(csvCollectionTest_userRecordB);
	expect($resultC) -> toMatchArray(csvCollectionTest_userRecordC);
});

test('readRecord should return null when record does not exist', function () {
	$result = csvCollectionTest_userCollection -> readRecord(10);

	expect($result) -> toBeNull();
});

#
# updateRecord
#

test('updateRecord should return true when update is successful', function () {
	$updateResult = csvCollectionTest_userCollection -> updateRecord(1, csvCollectionTest_userRecordA_update);
	$readResult = csvCollectionTest_userCollection -> readRecord(1);

	expect($updateResult) -> toBeTrue();
	expect($readResult) -> toMatchArray(csvCollectionTest_userRecordA_update);
});

test('updateRecord should return false when record does not exist', function () {
	$updateResult = csvCollectionTest_userCollection -> updateRecord(10, csvCollectionTest_userRecordA_update);

	expect($updateResult) -> toBeFalse();
});

#
# deleteRecord
#

test('deleteRecord should return true when deletion is successful', function () {
	$result = csvCollectionTest_userCollection -> deleteRecord(3);

	expect($result) -> toBeTrue();
});

test('deleteRecord should return false when record does not exist', function () {
	$result = csvCollectionTest_userCollection -> deleteRecord(10);

	expect($result) -> toBeFalse();
});