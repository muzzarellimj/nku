<?php

require_once(__DIR__ . '/../../src/auth/Authentication.php');

deAuthenticate();

header('location: /foober/public/index.php');