<?php

/**
 * A database model to construct new cars.
 * 
 * @author Michael Muzzarelli
 */
class CarModel {

    /**
     * A unique identifier meant to link a car record with a driver record as a FK.
     */
    public int $driverId;

    /**
     * A 4-character plaintext car year.
     */
    public string $year;

    /**
     * A valid car make.
     */
    public string $make;

    /**
     * A valid car model.
     */
    public string $model;

    /**
     * A valid license plate number.
     */
    public string $licensePlate;

    /**
     * Construct a car database model.
     * 
     * @param int $driverId         an identifier meant to link a car record to a driver record.
     * @param string $year          a plaintext car year.
     * @param string $make          a valid car make.
     * @param string $model         a valid car model.
     * @param string $licensePlate  a valid license plate number.
     */
    public function __construct(int $driverId, string $year, string $make, string $model, string $licensePlate) {
        $this->driverId = $driverId;
        $this->year = $year;
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
    }
}