<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');
require_once(__DIR__ . '/../../src/controller/LocationController.php');
require_once(__DIR__ . '/../../src/controller/RideController.php');
require_once(__DIR__ . '/../../src/database/attr/RoleAttr.php');
require_once(__DIR__ . '/../../src/util/KVPair.php');

if (!isset($_SESSION['riderId'])) {
    header('location: /foober/public/index.php');
}

# required role is DRIVER to allow completion of rides from driver dashboard
if ($_SESSION['role'] < RoleAttr::DRIVER->valueOf()) {
    header('location: /foober/public/index.php');
}

if (count($_GET) < 1 || !isset($_GET['rideId'])) {
    header('location: /foober/public/admin/admin.php');
}

$locationController = new LocationController();
$rideController = new RideController();
$ride = $rideController->read(new KVPair('ID', $_GET['rideId']));

$rideId = $ride['ID'];
$originId = $ride['originid'];
$destinationId = $ride['destinationid'];

$rideController->delete(new KVPair('ID', $rideId));
$locationController->delete(new KVPair('ID', $originId));
$locationController->delete(new KVPair('ID', $destinationId));

if ($_SESSION['role'] < RoleAttr::ADMINISTRATOR->valueOf()) {
    header('location: /foober/public/account.php');
} else {
    header('location: /foober/public/admin/admin.php');
}