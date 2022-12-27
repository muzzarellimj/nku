<?php

/**
 * An abstract collection handler meant to contain collection-specific, format-appropriate utility functions in each
 * child class.
 *
 * @author Michael Muzzarelli
 */
abstract class Handler {

	/**
	 * Create a collection that should not yet exist.
	 *
	 * @param string $filepath  the filepath to the collection that should be created.
	 *
	 * @return bool     true when creation is successful; false when not.
	 */
	public static abstract function createCollection(string $filepath): bool;

	/**
	 * Create a record and append it to an existing collection.
	 *
	 * @param string $filepath  the filepath to the local record collection.
	 * @param array $record     the set of record attributes.
	 *
	 * @return bool     true when creation is successful; false when not.
	 */
	public static abstract function createRecord(string $filepath, array $record): bool;

	/**
	 * Read a record collection into a PHP array.
	 *
	 * @param string $filepath  the filepath to the local record collection.
	 *
	 * @return array|null   a PHP array when read is successful; null when not.
	 */
	public static abstract function readCollection(string $filepath): array|null;

	/**
	 * Read a record from an existing collection as a format-appropriate PHP data structure.
	 *
	 * @param string $filepath the filepath to the local record collection.
	 * @param int $index       the collection index at which the record should exist.
	 *
	 * @return array|null   a format-appropriate PHP data structure when read is successful; null when not.
	 */
	public static abstract function readRecord(string $filepath, int $index): array|null;

	/**
	 * Update a record in an existing collection with $record.
	 *
	 * @param string $filepath  the filepath to the local record collection.
	 * @param int $index        the collection index at which the record should exist.
	 * @param array $record     the content with which the record should be updated.
	 *
	 * @return bool     true when update is successful; false when not.
	 */
	public static abstract function updateRecord(string $filepath, int $index, array $record): bool;

	/**
	 * Delete a record from an existing collection.
	 *
	 * @param string $filepath  the filepath to the local record collection.
	 * @param int $index        the collection index at which the record should exist.
	 *
	 * @return bool     true when deletion is successful; false when not.
	 */
	public static abstract function deleteRecord(string $filepath, int $index): bool;
}