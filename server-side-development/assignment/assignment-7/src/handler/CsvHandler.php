<?php

require_once 'Handler.php';

/**
 * A collection handler meant to contain CSV-appropriate utility functions.
 *
 * @author Michael Muzzarelli
 */
class CsvHandler extends Handler {

	public static function createCollection(string $filepath): bool {
		# error check: file should not exist at this point and existence should not be overwritten
		if (file_exists($filepath)) return false;

		# open output filestream
		$output = fopen($filepath, 'w') or die ('createCollection failure as file cannot be created');

		# create blank collection with EOL and write to $output
		fwrite($output, PHP_EOL);

		# close output filestream
		fclose($output);

		# error check: file should exist at this point and nonexistence indicates failure
		if (!file_exists($filepath)) return false;

		return true;
	}

	public static function createRecord(string $filepath, array $record): bool {
		# error check: collection file should exist
		if (!file_exists($filepath)) return false;

		# error check: $record should be valid
		if (!$record) return false;

		# open collection as output filestream in 'a' mode to append
		$output = fopen($filepath, 'a') or die ('createRecord unable to open filestream from ' . $filepath);

		# write $record to $output
		$result = fputcsv($output, $record);

		# close output filestream
		fclose($output);

		# error check: $result should not be 0 as fputcsv returns written line character count
		if (!$result) return false;

		return true;
	}

	public static function readCollection(string $filepath): array|null {
		# error check: collection file should exist
		if (!file_exists($filepath)) return null;

		# map collection
		$collection = array_map('str_getcsv', file($filepath)) or die ('readCollection unable to map collection from ' . $filepath);

		return $collection;
	}

	public static function readRecord(string $filepath, int $index): array|null {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# error check: record at index $index should exist
		if (!isset($collection[$index])) return null;

		return $collection[$index];
	}

	public static function updateRecord(string $filepath, int $index, array $record): bool {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# error check: $collection[$index] should exist
		if (!isSet($collection[$index])) return false;

		# error check: $record should be valid
		if (!$record) return false;

		# initialise replacement collection to contain replacement record
		$replacementCollection = array($index => $record);

		# replace record in $collection with record in $replacementCollection
		$collection = array_replace($collection, $replacementCollection);

		# open output file stream
		$output = fopen($filepath . '.temp', 'w') or die ('updateRecord unable to open output file stream to ' . $filepath . '.temp');

		# write each record in $collection to $output
		foreach ($collection as $collectionRecord) {
			fputcsv($output, $collectionRecord);
		}

		# close output file stream
		fclose($output);

		# unlink input collection filepath
		unlink($filepath) or die ('updateRecord unable to unlink input filepath');

		# rename output filepath to input filepath
		rename($filepath . '.temp', $filepath) or die ('updateRecord unable to rename output filepath');

		return true;
	}

	public static function deleteRecord(string $filepath, int $index): bool {
		# call readCollection to populate initial collection content
		$collection = self::readCollection($filepath);

		# error check: $collection[$index] should exist
		if (!isSet($collection[$index])) return false;

		# initialise replacement collection to contain replacement record
		$replacementCollection = array($index => [ ]);

		# replace record in $collection with record in $replacementCollection
		$collection = array_replace($collection, $replacementCollection);

		# open output file stream
		$output = fopen($filepath . '.temp', 'w') or die ('deleteRecord unable to open output file stream to ' . $filepath . '.temp');

		# write each record in $collection to $output
		foreach ($collection as $collectionRecord) {
			fputcsv($output, $collectionRecord);
		}

		# close output file stream
		fclose($output);

		# unlink input collection filepath
		unlink($filepath) or die ('deleteRecord unable to unlink input filepath');

		# rename output filepath to input filepath
		rename($filepath . '.temp', $filepath) or die ('deleteRecord unable to rename output filepath');

		return true;
	}
}