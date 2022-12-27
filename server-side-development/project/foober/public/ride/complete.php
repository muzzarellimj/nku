<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');

if (!isset($_SESSION['riderId'])) {
    header('location: /foober/public/index.php');
}

# required role is DRIVER to allow completion of rides from driver dashboard
if ($_SESSION['role'] < RoleAttr::DRIVER->valueOf()) {
    header('location: /foober/public/index.php');
}

if (count($_GET) < 1 || !isset($_GET['rideId'])) {
    header('location: /foober/public/account.php');
}

$rideId = $_GET['rideId'];

header("location: /foober/public/admin/delete-ride.php?rideId=$rideId");