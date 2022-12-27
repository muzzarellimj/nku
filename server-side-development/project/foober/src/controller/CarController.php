<?php

require_once(__DIR__ . '/EntityController.php');
require_once(__DIR__ . '/../database/model/DriverModel.php');
require_once(__DIR__ . '/../database/connection.php');

/**
 * A car entity controller that facilitates CRUD operations with car entities.
 * 
 * @author Michael Muzzarelli
 */
class CarController extends EntityController {

    /**
     * The table name within the database.
     */
    public string $tableName = 'cars';
    
	/**
	 * Create a car database record with respect to a defined car database object model.
	 *
	 * @param mixed $model  a car database object model class.
     * 
	 * @return bool     true when insertion is successful and false when it is not.
	 */
	public function create(mixed $model): bool {
        global $connection;

        # prepare statement
		$statement = $connection->prepare("INSERT INTO $this->tableName (driverid, year, make, model, licenseplate) VALUES ('$model->driverId', '$model->year', '$model->make', '$model->model', '$model->licensePlate')");

		# execute statement
		return $statement->execute();
	}
	
	/**
	 * Read the topmost car database record with respect to a query condition.
	 *
	 * @param KVPair $condition     a query condition key-value pair.
     * 
	 * @return array|bool   an associative array indexed by column name when query is successful and false when it is not.
	 */
	public function read(KVPair $condition): array|bool {
        global $connection;

        # reroute to readAll() when condition is not valid
        if (!$condition)
            return $this->readAll();

        # prepare statement
        $statement = $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key=$condition->value");

        # execute statement
        $statement->execute();

        # return fetch call with topmost record when successful or false when not
        return $statement->fetch();
	}

	/**
	 * Read one or more car database records with respect to a query condition.
	 * 
	 * @param KVPair $condition     a query condition key-value pair.
	 * 
	 * @return array|bool   an multidimensional array indexed by column name when query is successful and false when it is not.
	 */
	public function readSome(KVPair $condition): array |bool {
		global $connection;

		# reroute to readAll() when condition is not valid
		if (!$condition)
			return $this->readAll();

		# prepare statement
		$statement = $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key=$condition->value");

		# execute statement
		$statement->execute();

		# return fetch call with all appropriate records when successful or false when not
		return $statement->fetchAll();
	}
	
	/**
	 * Read all car database records without respect to a query condition.
     * 
	 * @return array|bool   a multidimensional associative array indexed by column name when query is successful
	 *                      and false when it is not.
	 */
	public function readAll(): array|bool {
        global $connection;

        # prepare statement
        $statement = $connection->prepare("SELECT * FROM $this->tableName");

        # execute statement
        $statement->execute();

        # return fetchAll call with all records when successful or false when not
        return $statement->fetchAll();
	}
	
	/**
	 * Update one or more car database records with respect to an update condition.
	 *
	 * @param KVPair $condition     a query condition key-value pair.
	 * @param KVPair $update        a column value update key-value pair.
     * 
	 * @return bool     true when update is successful and false when it is not.
	 */
	public function update(KVPair $condition, KVPair $update): bool {
        global $connection;

        # prepare statement
        $statement = $connection->prepare("UPDATE $this->tableName SET $update->key=$update->value WHERE $condition->key=$condition->value");

        # execute statement and return success status
        return $statement->execute();
	}
	
	/**
	 * Delete one or more car database records with respect to a deletion condition.
	 *
	 * @param KVPair $condition     a query condition key-value pair.
     * 
	 * @return bool     true when deletion is successful and false when it is not.
	 */
	public function delete(KVPair $condition): bool {
        global $connection;

		# prepare statement
		$statement = $connection->prepare("DELETE FROM $this->tableName WHERE $condition->key=$condition->value");

		# execute statement and return success status
		return $statement->execute();
	}
}