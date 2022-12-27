<?php

require_once(__DIR__ . '/../../src/conf.php');
require_once(__DIR__ . '/../../src/controller/CarController.php');
require_once(__DIR__ . '/../../src/database/attr/RoleAttr.php');
require_once(__DIR__ . '/../../src/database/model/CarModel.php');
require_once(__DIR__ . '/../../src/util/KVPair.php');
require_once(__DIR__ . '/../../src/auth/Authentication.php');

if (!isset($_SESSION['riderId'])) {
    header('location: /foober/public/index.php');
}

if ($_SESSION['role'] < RoleAttr::DRIVER->valueOf()) {
    header('location: /foober/public/index.php');
}

if (count($_POST) > 0) {
    $carController = new CarController();

    $_SESSION['errorMessage'] = null;

    $driverId = $_SESSION['driverId'];
    $year = $_POST['year'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $licensePlate = $_POST['licensePlate'];

    $insertCarResult = $carController->create(
        new CarModel($driverId, $year, $make, $model, $licensePlate)
    );

    if (!$insertCarResult) {
        $_SESSION['errorMessage'] = 'We could not register your car. Please try again.';
        header('location: /foober/public/car/add.php');
    }

    refresh($_SESSION['riderId']);

    header('location: /foober/public/account.php');
}

?>

<!doctype html>

<html lang="en">

<head>
    <title>
        <?= $conf['application']['name'] ?> | Add a Car
    </title>

    <?php require_once(__DIR__ . '/../../src/theme/DocumentMeta.php') ?>

    <link rel="icon" href="/foober/public/favicon.ico">

    <link rel="stylesheet" href="/foober/public/css/style.css">
    <link rel="stylesheet" href="/foober/public/css/fontawesome.min.css">
    <link rel="stylesheet" href="/foober/public/css/fontawesome-solid.css">
</head>

<body>
    <header class="navigation bg-tertiary">
        <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
            <div class="container">
                <a class="navbar-brand" href="/foober/public/index.php">
                    <img loading="prelaod" decoding="async" class="img-fluid" width="160"
                        src="/foober/public/img/logo.png" alt="<?= $conf['application']['name'] ?>">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/foober/public/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/foober/public/index.php#about">About</a></li>
                    </ul>

                    <?php if (!isset($_SESSION['riderId'])) { ?>
                    <a href="/foober/public/auth/signin.php" class="btn btn-outline-primary">Log In</a>
                    <a href="/foober/public/auth/signup.php" class="btn btn-primary ms-2 ms-lg-3">Sign Up</a>
                    <?php } else { ?>
                    <a href="/foober/public/account.php" class="btn btn-outline-primary">Account</a>
                    <a href="/foober/public/auth/signout.php" class="btn btn-primary ms-2 ms-lg-3">Sign Out</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>

    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">Add a Car</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a href="/foober/public/index.php">Home</a>
                        </li>
                        <li class="list-inline-item">/ &nbsp; <a href="/foober/public/car/add.php">Add a Car</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="has-shapes">
            <svg class="shape shape-left text-light" viewBox="0 0 192 752" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
            <svg class="shape shape-right text-light" viewBox="0 0 731 746" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <?php if (isset($_SESSION['errorMessage'])) { ?>
                <div class="col-lg-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Uh oh!</strong> <?= $_SESSION['errorMessage'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <?php } ?>

                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Add a Car</p>
                        <h1>Tell us how you'll Foober</h1>
                        <p>Drive on the platform with the largest network of active riders.</p>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="shadow rounded p-5 bg-white">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="contact-form">
                                    <form method="POST">
                                        <div class="form-group mb-4 pb-2">
                                            <label for="year" class="form-label">Year</label>
                                            <input type="text" class="form-control shadow-none" name="year"
                                                required>
                                        </div>

                                        <div class="form-group mb-4 pb-2">
                                            <label for="make" class="form-label">Make</label>
                                            <input type="text" class="form-control shadow-none" name="make"
                                                required>
                                        </div>

                                        <div class="form-group mb-4 pb-2">
                                            <label for="model" class="form-label">Model</label>
                                            <input type="text" class="form-control shadow-none" name="model"
                                                required>
                                        </div>

                                        <div class="form-group mb-4 pb-2">
                                            <label for="licensePlate" class="form-label">License Plate</label>
                                            <input type="text" class="form-control shadow-none" name="licensePlate"
                                                required>
                                        </div>

                                        <button class="btn btn-primary w-100" type="submit">Complete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="section-sm bg-tertiary">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="footer-widget">
                        <h5 class="mb-4 text-primary font-secondary">Company</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">About</a></li>
                            <li class="mb-2"><a href="#">Newsroom</a></li>
                            <li class="mb-2"><a href="#">Investors</a></li>
                            <li class="mb-2"><a href="#">Blog</a></li>
                            <li class="mb-2"><a href="#">Careers</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="footer-widget">
                        <h5 class="mb-4 text-primary font-secondary">Services</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">Ride</a></li>
                            <li class="mb-2"><a href="#">Drive</a></li>
                            <li class="mb-2"><a href="#">Deliver</a></li>
                            <li class="mb-2"><a href="#">Eat</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="footer-widget">
                        <h5 class="mb-4 text-primary font-secondary">Travel</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">Airports</a></li>
                            <li class="mb-2"><a href="#">Cities</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 newsletter-form">
                    <div style="background-color: #F4F4F4; padding: 35px;">
                        <h5 class="mb-4 text-primary font-secondary">Subscribe</h5>
                        <div class="pe-0 pe-xl-5">
                            <form action="#" method="post" name="mc-embedded-subscribe-form">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none bg-white border-end-0"
                                        placeholder="Email address"> <span class="input-group-text border-0 p-0">
                                        <button class="input-group-text border-0 bg-primary" type="submit"
                                            name="subscribe" aria-label="Subscribe for Newsletter"><i
                                                class="fas fa-arrow-right"></i></button>
                                    </span>
                                </div>
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                                </div>
                            </form>
                        </div>
                        <p class="mb-0">Lorem ipsum dolor sit amet, rdghds consetetur sadipscing elitr, sed diam nonumy
                            eirmod tempor invidunt ut labore et dolore magna aliquyam erat</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5 text-center text-md-start">
                <div class="col-lg-4">
                    <a href="/foober/public/index.php">
                        <img loading="preload" decoding="async" class="img-fluid" width="160"
                            src="/foober/public/img/logo.png" alt="<?= $conf['application']['name'] ?>">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <?php require_once(__DIR__ . '/../../src/theme/DocumentScripts.php') ?>
</body>

</html>