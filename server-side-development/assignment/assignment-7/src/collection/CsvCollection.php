<?php

require_once 'Collection.php';
require_once __DIR__ . '/../handler/CsvHandler.php';

/**
 * A collection object class meant to contain semantic CSV-appropriate utility functions.
 *
 * @author Michael Muzzarelli
 */
class CsvCollection extends Collection {

	/**
	 * Construct a CSV-formatted {@link Collection} object.
	 *
	 * @param string $name      a semantic collection name and filename.
	 */
	public function __construct(string $name) {
		parent::__construct($name, 'csv');
	}

	public function createCollection(): bool {
		return CsvHandler::createCollection($this -> filepath);
	}

	public function createRecord(array $record): bool {
		return CsvHandler::createRecord($this -> filepath, $record);
	}

	public function readCollection(): array|null {
		return CsvHandler::readCollection($this -> filepath);
	}

	public function readRecord(int $index): array|null {
		return CsvHandler::readRecord($this -> filepath, $index);
	}

	public function updateRecord(int $index, array $record): bool {
		return CsvHandler::updateRecord($this -> filepath, $index, $record);
	}

	public function deleteRecord(int $index): bool {
		return CsvHandler::deleteRecord($this -> filepath, $index);
	}
}