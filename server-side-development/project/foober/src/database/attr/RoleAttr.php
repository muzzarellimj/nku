<?php

/**
 * An user role enumeration meant to inform role-based permissions with a storable numeric value.
 * 
 * @author Michael Muzzarelli
 */
enum RoleAttr {

    # standard user: has profile and can request rides
    case RIDER;

    # elevated user: has profile, can request and accept rides, and has driver dashboard
    case DRIVER;

    # superuser: has profile, can request and accept rides, has driver dashboard, has admin dashboard
    case ADMINISTRATOR;

    /**
     * Retrieve a numeric role value.
     * 
     * @return int  a numeric role value.
     */
    public function valueOf() {
        return match ($this) {
            RoleAttr::RIDER => 20,
            RoleAttr::DRIVER => 50,
            RoleAttr::ADMINISTRATOR => 80
        };
    }
}