<?php

require_once(__DIR__ . '/../database/connection.php');
require_once(__DIR__ . '/../controller/CarController.php');
require_once(__DIR__ . '/../controller/DriverController.php');
require_once(__DIR__ . '/../controller/RiderController.php');
require_once(__DIR__ . '/../database/attr/RoleAttr.php');

# create or resume session
session_start();

function authenticate(string $emailAddress, string $password) {
    # instantiate controller
    $riderController = new RiderController();

    # retrieve rider
    $rider = $riderController->read(new KVPair('emailaddress', $emailAddress));

    # error check: rider should exist
    if (!$rider) {
        deAuthenticate();

        return null;
    }

    # error check: entered password should match stored password
    if (!password_verify($password, $rider['password'])) {
        deAuthenticate();

        return null;
    }

    $_SESSION['riderId'] = $rider['ID'];
    $_SESSION['role'] = $rider['role'];
    $_SESSION['firstName'] = $rider['firstname'];
    $_SESSION['lastName'] = $rider['lastname'];

    # consider driver
    if ($_SESSION['role'] >= RoleAttr::DRIVER->valueOf()) {
        # instantiate driver controller
        $driverController = new DriverController();

        # retrieve driver
        $driver = $driverController->read(new KVPair('riderid', $_SESSION['riderId']));

        # error check: driver should exist with role at or above DRIVER
        if (!$driver) {
            deAuthenticate();

            return null;
        }

        $_SESSION['driverId'] = $driver['ID'];

        # instantiate car controller
        $carController = new CarController();

        # retrieve car
        $car = $carController->read(new KVPair('driverid', $_SESSION['driverId']));

        # set car properties when a car exists
        if ($car) {
            $_SESSION['carId'] = $car['ID'];
        }
    }
}

function refresh(int $riderId) {
    # instantiate rider controller
    $riderController = new RiderController();

    # retrieve rider
    $rider = $riderController->read(new KVPair('ID', $riderId));

    # error check: rider should exist
    if (!$rider) {
        deAuthenticate();

        return null;
    }

    $_SESSION['riderId'] = $rider['ID'];
    $_SESSION['role'] = $rider['role'];
    $_SESSION['firstName'] = $rider['firstname'];
    $_SESSION['lastName'] = $rider['lastname'];

    # refresh driver attributes
    if ($_SESSION['role'] >= RoleAttr::DRIVER->valueOf()) {
        # instantiate driver controller
        $driverController = new DriverController();

        # retrieve driver
        $driver = $driverController->read(new KVPair('riderid', $_SESSION['riderId']));

        # error check: driver should exist with role at or above DRIVER
        if (!$driver) {
            deAuthenticate();

            return null;
        }

        $_SESSION['driverId'] = $driver['ID'];

        # instantiate car controller
        $carController = new CarController();

        # retrieve car
        $car = $carController->read(new KVPair('driverid', $_SESSION['driverId']));

        # set car properties when a car exists
        if ($car) {
            $_SESSION['carId'] = $car['ID'];
        }
    }
}

function deAuthenticate() {
    # set authentication properties to null
    $_SESSION['riderId'] = null;
    $_SESSION['role'] = null;
    $_SESSION['firstName'] = null;
    $_SESSION['lastName'] = null;
    $_SESSION['driverId'] = null;
    $_SESSION['carId'] = null;

    # destroy session
    session_destroy();
}