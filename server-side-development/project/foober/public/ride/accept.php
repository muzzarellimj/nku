<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');
require_once(__DIR__ . '/../../src/controller/RideController.php');
require_once(__DIR__ . '/../../src/util/KVPair.php');

if (!isset($_SESSION['driverId'])) {
    header('location: /foober/public/index.php');
}

if ($_SESSION['role'] < RoleAttr::DRIVER->valueOf()) {
    header('location: /foober/public/index.php');
}

if (count($_GET) < 1 || !isset($_GET['rideId'])) {
    header('location: /foober/public/account.php');
}

$rideController = new RideController();
$rideController->update(new KVPair('ID', $_GET['rideId']), new KVPair('driverid', $_SESSION['driverId']));

header('location: /foober/public/account.php');