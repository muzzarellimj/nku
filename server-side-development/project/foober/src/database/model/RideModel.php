<?php

/**
 * A database model to construct new rides.
 * 
 * @author Michael Muzzarelli
 */
class RideModel {

    /**
     * A unique identifier meant to link a ride record with an origin location record as a FK.
     */
    public int $originId;

    /**
     * A unique identifier meant to link a ride record with a destination location record as a FK.
     */
    public int $destinationId;

    /**
     * A unique identifier meant to link a ride record with a rider record as a FK.
     */
    public int $riderId;

    /**
     * A ride mileage represented in plaintext with a decimal.
     */
    public string $mileage;

    /**
     * A ride cost represented in plaintext with a decimal.
     */
    public string $cost;

    /**
     * Construct a ride database model.
     * 
     * @param int $originId         a unique identifier to link a ride record with an origin location record.
     * @param int $destinationId    a unique identifier to link a ride record with a destination location record.
     * @param int $riderId          a unique identifier to link a ride record with a rider record.
     * @param string $mileage       a ride mileage.
     * @param string $cost          a ride cost.
     */
    public function __construct(int $originId, int $destinationId, int $riderId, string $mileage, string $cost) {
        $this->originId = $originId;
        $this->destinationId = $destinationId;
        $this->riderId = $riderId;
        $this->mileage = $mileage;
        $this->cost = $cost;
    }
}