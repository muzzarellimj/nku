<?php

/**
 * A database model to construct new locations.
 * 
 * @author Michael Muzzarelli
 */
class LocationModel {

    /**
     * A primary (and first) street address line.
     */
    public string $streetAddress1;

    /**
     * A secondary (and second) street address line.
     */
    public string $streetAddress2;

    /**
     * A name of a city, town, village, etc.
     */
    public string $city;

    /**
     * A name of a state or province.
     */
    public string $state;

    /**
     * A 5-character or 9-character zip code.
     */
    public string $zipCode;

    /**
     * Construct a location database model.
     * 
     * @param string $streetAddress1    a primary street address line.
     * @param string $streetAddress2    a secondary street address line.
     * @param string $city              a city name.
     * @param string $state             a state name.
     * @param string $zipCode           a zip code.
     */
    public function __construct(string $streetAddress1, string $streetAddress2, string $city, string $state, string $zipCode) {
        $this->streetAddress1 = $streetAddress1;
        $this->streetAddress2 = $streetAddress2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }
}