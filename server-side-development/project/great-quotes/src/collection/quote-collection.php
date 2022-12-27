<?php

include_once __DIR__ . '/collection.php';
include_once __DIR__ . '/collection-util.php';

/**
 * An extension of {@link Collection} to simplify quote operations.
 *
 * Note: documentation is not provided here as it is defined in {@link Collection}. This is an intentional effort to
 * reduce redundant documentation.
 */
class QuoteCollection extends Collection {

	public function __construct() {
		parent::__construct('quote');
	}

	public function retrieveCollection(): array {
		return retrieveCollection($this -> filepath);
	}

	public function retrieveRecord(int $index): array|null {
		return retrieveRecord($this -> filepath, $index);
	}

	public function createRecord(array $record): bool {
		return createRecord($this -> filepath, $record);
	}

	public function updateRecord(int $index, array $record): int|null {
		return updateRecord($this -> filepath, $index, $record);
	}

	public function deleteRecord(int $index): int|null {
		return deleteRecord($this -> filepath, $index);
	}

	public function deleteRecordSet(array $indices): bool {
		return deleteRecordSet($this -> filepath, $indices);
	}

	public function deleteRecordDeep(int $index): int|null {
		return deleteRecordDeep($this -> filepath, $index);
	}
}