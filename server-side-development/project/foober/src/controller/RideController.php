<?php

require_once(__DIR__ . '/EntityController.php');
require_once(__DIR__ . '/../database/model/RideModel.php');
require_once(__DIR__ . '/../database/connection.php');

/**
 * A ride entity controller that facilitates CRUD operations with ride entities.
 * 
 * @author Michael Muzzarelli
 */
class RideController extends EntityController {

    /**
     * The table name within the database.
     */
    public string $tableName = 'rides';

    /**
     * Create a ride database record with respect to a defined database object model.
     *
     * @param mixed $model  a ride database object model class.
     * 
     * @return bool     true when insertion is successful and false when it is not.
     */
    public function create(mixed $model): bool {
        global $connection;

        # prepare statement
        $statement = $connection->prepare("INSERT INTO $this->tableName (originid, destinationid, riderid, mileage, cost) VALUES ('$model->originId', '$model->destinationId', '$model->riderId', '$model->mileage', '$model->cost')");

        # execute statement
        return $statement->execute();
    }

    /**
     * Read the topmost ride database record with respect to a query condition.
     *
     * @param KVPair $condition     a query condition key-value pair.
     * 
     * @return array|bool   an associative array indexed by column name when query is successful and false when it is not.
     */
    public function read(KVPair $condition): array |bool {
        global $connection;

        # reroute to readAll() when condition is not valid
        if (!$condition)
            return $this->readAll();

        # prepare standard statement when conditions are valid or null statement when $condition->value is null
        $statement = $condition->value ? 
            $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key=$condition->value") :
            $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key IS NULL");

        # execute statement
        $statement->execute();

        # return fetch call with topmost record when successful or false when not
        return $statement->fetch();
    }

    /**
	 * Read one or more ride database records with respect to a query condition.
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

        # prepare standard statement when conditions are valid or null statement when $condition->value is null
        $statement = $condition->value ? 
            $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key=$condition->value") :
            $connection->prepare("SELECT * FROM $this->tableName WHERE $condition->key IS NULL");

		# execute statement
		$statement->execute();

		# return fetch call with all appropriate records when successful or false when not
		return $statement->fetchAll();
	}

    /**
     * Read all ride database records without respect to a query condition.
     * 
     * @return array|bool   a multidimensional associative array indexed by column name when query is successful
     *                      and false when it is not.
     */
    public function readAll(): array |bool {
        global $connection;

        # prepare statement
        $statement = $connection->prepare("SELECT * FROM $this->tableName");

        # execute statement
        $statement->execute();

        # return fetchAll call with all records when successful or false when not
        return $statement->fetchAll();
    }

    /**
     * Update one or more ride database records with respect to an update condition.
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
     * Delete one or more ride database records with respect to a deletion condition.
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