<?php

require_once 'Handler.php';

/**
 * A collection handler meant to contain JSON-appropriate utility functions.
 *
 * @author Michael Muzzarelli
 */
class JsonHandler extends Handler {

	public static function createCollection(string $filepath): bool {
		# return false when collection file exists and should not be overwritten
		if (file_exists($filepath)) return false;

		# open filestream to create file
		$collection = fopen($filepath, 'w') or die ('createCollection failure as file cannot be created');

		# json_encode empty array in collection
		fwrite($collection, json_encode([ ]));

		# close filestream
		fclose($collection);

		# return false when collection file does not exist and indicates failure
		if (!file_exists($filepath)) return false;

		# code reached indicates success - return true
		return true;
	}

	public static function createRecord(string $filepath, array $record): bool {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# return false when collection is null
		if ($collection === null) return false;

		# open output filestream
		$output = fopen($filepath . '.temp', 'w') or die ('createRecord failure as output filestream cannot be opened');

		# push $record to $collection
		$collection[] = $record;

		# write collection to output stream
		fwrite($output, json_encode($collection));

		# close output filestream
		fclose($output);

		# unlink input filepath
		unlink($filepath) or die ('createRecord failure as input filepath cannot be unlinked');

		# rename output filepath to input filepath
		rename($filepath . '.temp', $filepath) or die ('createRecord failure as output filepath cannot be renamed as input filepath');

		# code reached indicates success - return true
		return true;
	}

	public static function readCollection(string $filepath): array|null {
		# return null when collection file does not exist
		if (!file_exists($filepath)) return null;

		# read local collection file content
		$collection = file_get_contents($filepath) or die ('readCollection failure as file content cannot be read');

		# json_decode local collection file content and return
		return json_decode($collection, true);
	}

	public static function readRecord(string $filepath, int $index): array|null {
		# retrieve initial collection
		$collection = self::readCollection($filepath);

		# return null when record does not exist
		if (!isset($collection[$index])) return null;

		# return record
		return $collection[$index];
	}

	public static function updateRecord(string $filepath, int $index, array $record): bool {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# return false when record does not exist
		if (!isSet($collection[$index])) return false;

		# initialise replacement collection to contain replacement record
		$replacementCollection = array($index => $record);

		# replace record in $collection with record in $replacementCollection
		$collection = array_replace($collection, $replacementCollection);

		# open output filestream
		$output = fopen($filepath . '.temp', 'w') or die ('updateRecord failed as output filestream could not be opened');

		# json_encode $collection and write to $output
		fwrite($output, json_encode($collection));

		# close output filestream
		fclose($output);

		# unlink input filepath
		unlink($filepath) or die ('updateRecord failure as input filepath cannot be unlinked');

		# rename output filepath to input filepath
		rename($filepath . '.temp', $filepath) or die ('updateRecord failure as output filepath cannot be renamed as input filepath');

		# code reach indicates success - return true
		return true;
	}

	public static function deleteRecord(string $filepath, int $index): bool {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# return false when record does not exist
		if (!isSet($collection[$index])) return false;

		# store initial record count
		$recordCount = count($collection);

		# splice collection to delete record at index $index
		array_splice($collection, $index, 1);

		# error check: post-delete record count should be less than $recordCount
		if ($recordCount <= count($collection)) return false;

		# open output filestream
		$output = fopen($filepath . '.temp', 'w') or die ('deleteRecord failed as output filestream could not be opened');

		# json_encode $collection and write to $output
		fwrite($output, json_encode($collection));

		# close output filestream
		fclose($output);

		# unlink input filepath
		unlink($filepath) or die ('deleteRecord failure as input filepath cannot be unlinked');

		# rename output filepath to input filepath
		rename($filepath . '.temp', $filepath) or die ('deleteRecord failure as output filepath cannot be renamed as input filepath');

		# code reach indicates success - return true
		return true;
	}
}