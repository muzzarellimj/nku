<?php

require_once 'Collection.php';
require_once __DIR__ . '/../handler/JsonHandler.php';

/**
 * A collection object class meant to contain semantic JSON-appropriate utility functions.
 *
 * @author Michael Muzzarelli
 */
class JsonCollection extends Collection {

	/**
	 * Construct a JSON {@link Collection} object.
	 *
	 * @param string $name      a semantic collection name and filename.
	 */
	public function __construct(string $name) {
		parent::__construct($name, 'json');
	}

	public function createCollection(): bool {
		return JsonHandler::createCollection($this -> filepath);
	}

	public function createRecord(array $record): bool {
		return JsonHandler::createRecord($this -> filepath, $record);
	}

	public function readCollection(): array|null {
		return JsonHandler::readCollection($this -> filepath);
	}

	public function readRecord(int $index): array|null {
		return JsonHandler::readRecord($this -> filepath, $index);
	}

	public function updateRecord(int $index, array $record): bool {
		return JsonHandler::updateRecord($this -> filepath, $index, $record);
	}

	public function deleteRecord(int $index): bool {
		return JsonHandler::deleteRecord($this -> filepath, $index);
	}
}