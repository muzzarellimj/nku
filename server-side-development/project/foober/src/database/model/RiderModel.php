<?php

require_once(__DIR__ . '/../attr/RoleAttr.php');

/**
 * A database model to construct new riders with role RoleAttr::RIDER in account creation.
 * 
 * @author Michael Muzzarelli
 */
class RiderModel {

    /**
     * A valid email address.
     */
    public string $emailAddress;

    /**
     * A hashed value built via a plaintext password.
     */
    public string $password;

    /**
     * A valid first name.
     */
    public string $firstName;

    /**
     * A valid last name.
     */
    public string $lastName;

    /**
     * A numeric value indicative of role and permission set - set to RoleAttr::RIDER in account creation.
     */
    public int $role;

    /**
     * Construct a rider database model.
     * 
     * @param string $emailAddress  an email address and username.
     * @param string $password      a hashed password value.
     * @param string $firstName     a first name.
     * @param string $lastName      a last name.
     */
    public function __construct(string $emailAddress, string $password, string $firstName, string $lastName) {
        $this->emailAddress = $emailAddress;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = RoleAttr::RIDER->valueOf();
    }
}