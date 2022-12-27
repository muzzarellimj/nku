<?php

/**
 * A database model to construct new drivers.
 * 
 * @author Michael Muzzarelli
 */
class DriverModel {

    /**
     * A unique identifier meant to link a driver record with a rider record as a FK.
     */
    public int $riderId;

    /**
     * A valid license number.
     */
    public string $licenseNumber;

    /**
     * A valid license expiration date represented as a 4-character plaintext value.
     */
    public string $licenseExpiration;

    /**
     * A valid bank account number.
     */
    public string $bankAccountNumber;

    /**
     * A valid bank routing number.
     */
    public string $bankRoutingNumber;

    /**
     * Construct a driver database model.
     * 
     * @param int $riderId                  an identifier meant to link a driver record to a rider record.
     * @param string $licenseNumber         a valid license number.
     * @param string $licenseExpiration     a valid license expiration date represented in plaintext.
     * @param string $bankAccountNumber     a valid bank account number.
     * @param string $bankRoutingNumber     a valid bank routing number.
     */
    public function __construct(int $riderId, string $licenseNumber, string $licenseExpiration, string $bankAccountNumber, string $bankRoutingNumber) {
        $this->riderId = $riderId;
        $this->licenseNumber = $licenseNumber;
        $this->licenseExpiration = $licenseExpiration;
        $this->bankAccountNumber = $bankAccountNumber;
        $this->bankRoutingNumber = $bankRoutingNumber;
    }
}