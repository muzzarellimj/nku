<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');
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

if (count($_GET) < 1 || !isset($_GET['riderId'])) {
    header('location: /foober/public/admin/admin.php');
}

$riderController = new RiderController();
$riderController->delete(new KVPair('ID', $_GET['riderId']));

header('location: /foober/public/admin/admin.php');