<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');
require_once(__DIR__ . '/../../src/controller/DriverController.php');
require_once(__DIR__ . '/../../src/controller/RiderController.php');
require_once(__DIR__ . '/../../src/database/attr/RoleAttr.php');
require_once(__DIR__ . '/../../src/util/KVPair.php');

if (!isset($_SESSION['riderId'])) {
    header('location: /foober/public/index.php');
}

# required role is ADMINISTRATOR
if ($_SESSION['role'] < RoleAttr::ADMINISTRATOR->valueOf()) {
    header('location: /foober/public/index.php');
}

if (count($_GET) < 1 || !isset($_GET['driverId'])) {
    header('location: /foober/public/admin/admin.php');
}

$driverController = new DriverController();
$driver = $driverController->read(new KVPair('ID', $_GET['driverId']));

$driverController->delete(new KVPair('ID', $driver['ID']));

$riderController = new RiderController();
$riderController->update(new KVPair('ID', $driver['riderid']), new KVPair('role', RoleAttr::RIDER->valueOf()));

header('location: /foober/public/admin/admin.php');