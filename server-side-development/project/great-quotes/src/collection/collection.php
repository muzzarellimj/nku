<?php

include_once __DIR__ . '/../../constant.php';

abstract class Collection {

	/**
	 * A semantic collection name to be utilised as a filename.
	 */
	public string $name;

	/**
	 * A collection filename and path.
	 */
	public string $filepath;

	/**
	 * Construct a {@link Collection} object.
	 *
	 * @param string $name  a semantic collection name to be utilised as a filename.
	 */
	public function __construct(string $name) {
		$this -> name = $name;
		$this -> filepath = ROOT . '/data/' . $name . '.csv';
	}

	/**
	 * Retrieve a record collection.
	 *
	 * @return array    a record collection structured as an array.
	 */
	abstract public function retrieveCollection() : array;

	/**
	 * Retrieve a record from a collection.
	 *
	 * @param int $index    an index of a record within a collection.
	 *
	 * @return array|null   an appropriate record when present, null when not.
	 */
	abstract public function retrieveRecord(int $index) : array|null;

	/**
	 * Create a record and append it to a collection.
	 *
	 * @param array $record     an array of record attributes.
	 *
	 * @return bool     true when creation is successful, false when not.
	 */
	abstract public function createRecord(array $record) : bool;

	/**
	 * Update a record in a collection with the attributes defined in $record.
	 *
	 * @param int $index        an index of a record within a collection.
	 * @param array $record     an array of record attributes.
	 *
	 * @return int|null     an index of an updated record when update is successful, null when it is not.
	 */
	abstract public function updateRecord(int $index, array $record) : int|null;

	/**
	 * Delete a record from a collection and replace it with a blank line.
	 *
	 * @param int $index    an index of a record within a collection.
	 *
	 * @return int|null     an index of a deleted record when deletion is successful, null when it is not.
	 */
	abstract public function deleteRecord(int $index) : int|null;

	/**
	 * Delete a set of records from a collection and replace each with a blank line.
	 *
	 * @param array $indices    a set of indices of records within a collection.
	 *
	 * @return bool     true when at least one record is deleted; false when no records are deleted.
	 */
	abstract public function deleteRecordSet(array $indices): bool;

	/**
	 * Delete a record from a collection and remove the line on which it existed.
	 *
	 * @param int $index    an index of a record within a collection.
	 *
	 * @return int|null     an index of a deleted record when deletion is successful, null when it is not.
	 */
	abstract public function deleteRecordDeep(int $index) : int|null;
}