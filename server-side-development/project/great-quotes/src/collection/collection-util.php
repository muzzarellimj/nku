<?php

include_once __DIR__ . '/../../constant.php';

/**
 * Retrieve a record collection via function array_map on the content of a local CSV file.
 *
 * @param string $filepath  a name and path of a local CSV file.
 *
 * @return array    a record collection structured as an array.
 */
function retrieveCollection(string $filepath) : array {
	# map collection
	$collection = array_map('str_getcsv', file($filepath)) or die ('readCollection unable to map collection from ' . $filepath);

	# cleanse collection
	foreach ($collection as $record => $value) {

		# store record start value
		$start = $value[0];

		# unset record if start is invalid
		if (!$start) {
			unset($collection[$record]);
		}
	}

	return $collection;
}

/**
 * Retrieve a record from a collection.
 *
 * @param string $filepath  a name and path of a local CSV file.
 * @param int $index        an index of a record within a collection.
 *
 * @return array|null   an appropriate record when present, null when not.
 */
function retrieveRecord(string $filepath, int $index) : array|null {
	# populate initial collection via retrieveCollection
	$collection = retrieveCollection($filepath) or die ('retrieveRecord unable to populate collection via retrieveCollection');

	# return record when valid, null when not
	return $collection[$index] ?? null;
}

/**
 * Retrieve a position of a record from a collection when one matches the provided attributes.
 *
 * @param string $filepath      a name and path of a local CSV file.
 * @param mixed ...$attribute   a set of attributes a record should match.
 *
 * @return int|null     a record position when a match is found, null when one is not.
 */
function retrieveRecordPosition(string $filepath, mixed ...$attribute) : int|null {
	# populate initial collection via retrieveCollection
	$collection = retrieveCollection($filepath) or die ('retrieveRecordPosition unable to populate collection via retrieveCollection');

	# evaluate each record against $attribute set
	for ($i = 0; $i < count($collection); $i++) {
		# initialise match potential
		$match = $i;

		# initialise each record attribute against value of each $attribute
		for ($j = 0; $j < count($attribute); $j++) {

			# set $match to null when at least one $attribute does not match anticipated value
			if (trim($collection[$i][$j]) != trim($attribute[$j])) {
				$match = null;
			}
		}

		# return match when one is determined
		if ($match !== null) return $match;
	}

	# return null when no match is determined
	return null;
}

/**
 * Create a record and append it to a collection.
 *
 * @param string $filepath  a name and path of a local CSV file.
 * @param array $record     an array of record attributes.
 *
 * @return bool     true when creation is successful, false when not.
 */
function createRecord(string $filepath, array $record): bool {
	# open file stream in write mode
	$file = fopen($filepath, 'a') or die ('createRecord unable to open file stream from ' . $filepath);

	# return false when record is invalid
	if (!$record) {
		return false;
	}

	# append record to $file
	$result = fputcsv($file, $record);

	# close file stream
	fclose($file);

	# return true when creation is successful, false when not
	return $result > 0;
}

/**
 * Update a record in a collection with the attributes defined in $record.
 *
 * @param string $filepath  a name and path of a local CSV file.
 * @param int $index        an index of a record within a collection.
 * @param array $record     an array of record attributes.
 *
 * @return int|null     an index of an updated record when update is successful, null when it is not.
 */
function updateRecord(string $filepath, int $index, array $record) : int|null {
	# populate initial collection
	$input = retrieveCollection($filepath) or die ('updateRecord unable to populate collection via retrieveCollection');

	# open output file stream
	$output = fopen($filepath . '.temp', 'w') or die ('updateRecord unable to open output file stream to ' . $filepath . '.temp');

	# initialise update index
	$update_index = null;

	# evaluate each record to determine record to update
	for ($i = 0; $i < count($input); $i++) {

		# replace record to update with $record if $i is equal to $index
		if ($i == $index) {
			$update_index = $i;

			fputcsv($output, $record);

		# else copy record to output
		} else {
			fputcsv($output, $input[$i]);
		}
	}

	# close output file stream
	fclose($output);

	# unlink input filepath
	unlink($filepath) or die ('deleteRecord unable to unlink input filepath');

	# rename output filepath to input filepath
	rename($filepath . '.temp', $filepath) or die ('deleteRecord unable to rename output filepath');

	return $update_index;
}

/**
 * Delete a record from a collection and replace it with a blank line.
 *
 * @param string $filepath  a name and path to a local CSV file.
 * @param int $index        an index of a record within a collection.
 *
 * @return bool     true when at least one record is deleted; false when no records are deleted.
 */
function deleteRecord(string $filepath, int $index): bool {
	# populate initial collection
	$input = retrieveCollection($filepath) or die ('deleteRecord unable to populate collection via retrieveCollection');

	# open output file stream
	$output = fopen($filepath . '.temp', 'w') or die ('deleteRecord unable to open output file stream to ' . $filepath . '.temp');

	# initialise deletion counter
	$deletionCount = 0;

	# evaluate each record to determine record to delete
	foreach ($input as $position => $record) {

		# replace record to delete with blank record if $position is equal to $index
		if ($position == $index) {
			$deletionCount++;

			fputcsv($output, []);

		# otherwise copy record to output
		} else {
			fputcsv($output, $record);
		}
	}

	# close output file stream
	fclose($output);

	# unlink input filepath
	unlink($filepath) or die ('deleteRecord unable to unlink input filepath');

	# rename output filepath to input filepath
	rename($filepath . '.temp', $filepath) or die ('deleteRecord unable to rename output filepath');

	# return true when deletionCount has been increased, false when it has not
	return $deletionCount > 0;
}

/**
 * Delete a set of records from a collection and replace each with a blank line.
 *
 * @param string $filepath  a name and path to a local CSV file.
 * @param array $indices    a set of indices of records within a collection.
 *
 * @return bool     true when at least one record is deleted; false when no records are deleted.
 */
function deleteRecordSet(string $filepath, array $indices): bool {
	# populate initial collection
	$input = retrieveCollection($filepath) or die ('deleteRecordSet unable to populate collection via retrieveCollection');

	# open output file stream
	$output = fopen($filepath . '.temp', 'w') or die ('deleteRecordSet unable to open output file stream to ' . $filepath . '.temp');

	# initialise deletion counter
	$deletionCount = 0;

	# evaluate each record to determine deletion set
	foreach ($input as $position => $record) {

		# replace records in deletion set with blank record if $position is in $indices
		if (in_array($position, $indices)) {
			$deletionCount++;

			fputcsv($output, []);

		# otherwise copy record to output
		} else {
			fputcsv($output, $record);
		}
	}

	# close output file stream
	fclose($output);

	# unlink input filepath
	unlink($filepath) or die ('deleteRecordSet unable to unlink input filepath');

	# rename output filepath to input filepath
	rename($filepath . '.temp', $filepath) or die ('deleteRecordSet unable to rename output filepath');

	# return true when deletionCount has been increased, false when it has not
	return $deletionCount > 0;
}

/**
 * Delete an {@link AuthorCollection} record and all appropriate {@link QuoteCollection} records and replace each with a
 * blank line.
 *
 * @param int $authorPosition                   a position of an author in an {@link AuthorCollection}.
 * @param AuthorCollection $authorCollection    an {@link AuthorCollection} wherein deletion should occur.
 * @param QuoteCollection $quoteCollection      an {@link QuoteCollection} wherein deletion should occur.
 *
 * @return bool     true when deletion is successful, false when deletion is unsuccessful.
 */
function deleteRecordCascade(int $authorPosition, AuthorCollection $authorCollection, QuoteCollection $quoteCollection): bool {
	# store deletion result
	$authorDeleteResult = $authorCollection -> deleteRecord($authorPosition);

	# return false when author deletion is unsuccessful
	if ($authorDeleteResult === null) return false;

	# populate and filter quote collection content
	$quoteCollectionContent = $quoteCollection -> retrieveCollection();
	$quoteCollectionContent = array_filter($quoteCollectionContent, function ($quote) use ($authorPosition) { return $quote[1] == $authorPosition; });

	# initialise deletion set indices container
	$quoteDeleteIndices = [ ];

	# populate $quoteDeletionIndices with appropriate indices to delete
	foreach ($quoteCollectionContent as $quoteCollectionPosition => $quote) {
		array_push($quoteDeleteIndices, $quoteCollectionPosition);
	}

	# delete all indices in $quoteDeletionIndices
	$quoteDeleteResult = $quoteCollection -> deleteRecordSet($quoteDeleteIndices);

	# return true when author deletion and quote set deletion are both successful, false when either or both are not
	return $authorDeleteResult && $quoteDeleteResult;
}

/**
 * Delete a record from a collection and remove the line on which it existed.
 *
 * @param string $filepath  a name and path of a local CSV file.
 * @param int $index        an index of a record within a collection.
 *
 * @return int|null     an index of a deleted record when deletion is successful, null when it is not.
 */
function deleteRecordDeep(string $filepath, int $index) : int|null {
	# populate initial collection
	$input = retrieveCollection($filepath) or die ('deleteRecordDeep unable to populate collection via retrieveCollection');

	# open output file stream
	$output = fopen($filepath . '.temp', 'w') or die ('deleteRecordDeep unable to open output file stream to ' . $filepath . '.temp');

	# initialise deletion index
	$deletion_index = null;

	# evaluate each record to determine record to delete
	for ($i = 0; $i < count($input); $i++) {

		# continue if $i is equal to $index
		if ($i == $index) {
			$deletion_index = $i;

			continue;
		}

		# copy record to output
		fputcsv($output, $input[$i]);
	}

	# close output file stream
	fclose($output);

	# unlink input filepath
	unlink($filepath) or die ('deleteRecordDeep unable to unlink input filepath');

	# rename output filepath to input filepath
	rename($filepath . '.temp', $filepath) or die ('deleteRecordDeep unable to rename output filepath');

	return $deletion_index;
}