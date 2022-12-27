<?php

/**
 * An abstract collection object class meant to contain more semantic, format-appropriate functions in each child class.
 *
 * @author Michael Muzzarelli
 */
abstract class Collection {

	/**
	 * An absolute filepath to a record collection.
	 */
	public string $filepath;

	/**
	 * Construct a record {@link Collection} object.
	 *
	 * @param string $name      a semantic collection name and filename.
	 * @param string $format    a collection format extension, e.g., CSV or JSON.
	 */
	public function __construct(string $name, string $format) {
		$this -> filepath = __DIR__ . '/../../data/' . $name . '.' . $format;
	}

	/**
	 * Create a collection that should not yet exist.
	 *
	 * @return bool     true when creation is successful; false when not.
	 */
	public abstract function createCollection(): bool;

	/**
	 * Create a record and append it to an existing collection.
	 *
	 * @param array $record     a set of record attributes.
	 *
	 * @return bool     true when creation is successful; false when not.
	 */
	public abstract function createRecord(array $record): bool;

	/**
	 * Read a record collection into a PHP array.
	 *
	 * @return array|null   a PHP array when read is successful; null when not.
	 */
	public abstract function readCollection(): array|null;

	/**
	 * Read a record from an existing collection as a format-appropriate PHP data structure.
	 *
	 * @param int $index       the collection index at which the record should exist.
	 *
	 * @return array|null   a format-appropriate PHP data structure when read is successful; null when not.
	 */
	public abstract function readRecord( int $index): array|null;

	/**
	 * Update a record in an existing collection with $record.
	 *
	 * @param int $index        the collection index at which the record should exist.
	 * @param array $record     the content with which the record should be updated.
	 *
	 * @return bool     true when update is successful; false when not.
	 */
	public abstract function updateRecord(int $index, array $record): bool;

	/**
	 * Delete a record from an existing collection.
	 *
	 * @param int $index        the collection index at which the record should exist.
	 *
	 * @return bool     true when deletion is successful; false when not.
	 */
	public abstract function deleteRecord( int $index): bool;
}