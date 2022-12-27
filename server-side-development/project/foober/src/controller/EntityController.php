<?php

require_once(__DIR__ . '/../util/KVPair.php');

/**
 * An abstract entity controller class that facilitates CRUD operations with a database entity.
 * 
 * @author Michael Muzzarelli
 */
abstract class EntityController {

    /**
     * Create a database record with respect to a defined database object model.
     * 
     * @param mixed $model  a database object model class.
     * 
     * @return bool     true when insertion is successful and false when it is not.
     */
    public abstract function create(mixed $model): bool;

    /**
     * Read the topmost database record with respect to a query condition.
     * 
     * @param KVPair $condition     a query condition key-value pair.
     * 
     * @return array|bool   an associative array indexed by column name when query is successful and false when it is not.
     */
    public abstract function read(KVPair $condition): array|bool;

    /**
     * Read one or more database records with respect to a query condition.
     * 
     * @param KVPair $condition     a query condition key-value pair.
     * 
     * @return array|bool   an multidimensional array indexed by column name when query is successful and false when it is not.
     */
    public abstract function readSome(KVPair $condition): array |bool;

    /**
     * Read all database records without respect to a query condition.
     * 
     * @return array|bool   a multidimensional associative array indexed by column name when query is successful 
     *                      and false when it is not.
     */
    public abstract function readAll(): array|bool;

    /**
     * Update one or more database records with respect to an update condition.
     * 
     * @param KVPair $condition     a query condition key-value pair.
     * @param KVPair $update        a column value update key-value pair.
     * 
     * @return bool     true when update is successful and false when it is not.
     */
    public abstract function update(KVPair $condition, KVPair $update): bool;

    /**
     * Delete one or more database records with respect to a deletion condition.
     * 
     * @param KVPair $condition     a query condition key-value pair.
     * 
     * @return bool     true when deletion is successful and false when it is not.
     */
    public abstract function delete(KVPair $condition): bool;
}