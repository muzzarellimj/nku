<?php

require_once __DIR__ . '/../../src/collection/JsonCollection.php';

const jsonCollectionTest_userCollection = new JsonCollection('user');

const jsonCollectionTest_userRecordA = [ 'name' => 'Michael Muzzarelli', 'status' => 'Junior' ];
const jsonCollectionTest_userRecordA_update = [ 'name' => 'Michael Muzzarelli', 'status' => 'Senior' ];

const jsonCollectionTest_userRecordB = [ 'name' => 'Andrew Oneal', 'status' => 'Sophomore' ];

const jsonCollectionTest_userRecordC = [ 'name' => 'Record to Delete', 'status' => 'Senior' ];

#
# unlink collection in setup and teardown
#

beforeAll(function () {
	$filepath = jsonCollectionTest_userCollection -> filepath;

	if (file_exists($filepath)) unlink($filepath);
});

afterAll(function () {
	$filepath = jsonCollectionTest_userCollection -> filepath;

	if (file_exists($filepath)) unlink($filepath);
});

#
# createCollection
#

test('createCollection should create JSON collection file when one does not exist', function () {
	jsonCollectionTest_userCollection -> createCollection('user');

	expect(file_exists(jsonCollectionTest_userCollection -> filepath)) -> toBeTrue();
});

test('createCollection should fail to create JSON collection file when one does exist', function () {
	$result = jsonCollectionTest_userCollection -> createCollection('user');

	expect($result) -> toBeFalse();
});

#
# readCollection
#

test('readCollection should read a sample collection and return an array', function () {
	$result = jsonCollectionTest_userCollection -> readCollection();

	expect($result) -> toBeArray();
});

#
# createRecord
#

test('createRecord should return true when record is created in collection', function () {
	$resultA = jsonCollectionTest_userCollection -> createRecord(jsonCollectionTest_userRecordA);
	$resultB = jsonCollectionTest_userCollection -> createRecord(jsonCollectionTest_userRecordB);
	$resultC = jsonCollectionTest_userCollection -> createRecord(jsonCollectionTest_userRecordC);

	expect($resultA && $resultB && $resultC) -> toBeTrue();
});

#
# readRecord
#

test('readRecord should return correct record with respect to index', function () {
	$resultA = jsonCollectionTest_userCollection -> readRecord(0);
	$resultB = jsonCollectionTest_userCollection -> readRecord(1);
	$resultC = jsonCollectionTest_userCollection -> readRecord(2);

	expect($resultA) -> toMatchArray(jsonCollectionTest_userRecordA);
	expect($resultB) -> toMatchArray(jsonCollectionTest_userRecordB);
	expect($resultC) -> toMatchArray(jsonCollectionTest_userRecordC);
});

test('readRecord should return null when record does not exist', function () {
	$result = jsonCollectionTest_userCollection -> readRecord(10);

	expect($result) -> toBeNull();
});

#
# updateRecord
#

test('updateRecord should return true when update is successful', function () {
	$updateResult = jsonCollectionTest_userCollection -> updateRecord(0, jsonCollectionTest_userRecordA_update);
	$readResult = jsonCollectionTest_userCollection -> readRecord(0);

	expect($updateResult) -> toBeTrue();
	expect($readResult) -> toMatchArray(jsonCollectionTest_userRecordA_update);
});

test('updateRecord should return false when record does not exist', function () {
	$updateResult = jsonCollectionTest_userCollection -> updateRecord(10, jsonCollectionTest_userRecordA_update);

	expect($updateResult) -> toBeFalse();
});

#
# deleteRecord
#

test('deleteRecord should return true when deletion is successful', function () {
	$result = jsonCollectionTest_userCollection -> deleteRecord(2);

	expect($result) -> toBeTrue();
});

test('deleteRecord should return false when record does not exist', function () {
	$result = jsonCollectionTest_userCollection -> deleteRecord(10);

	expect($result) -> toBeFalse();
});