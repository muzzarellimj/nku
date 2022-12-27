<?php
    include 'data.php';
    include 'function.php';

    global $class;
    global $members;

    $member = $members[$_GET['member']];
?>

<!doctype html>

<html lang="en">
    <head>
        <!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title><?= $class ?></title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>
        <link rel="stylesheet" href="asset/css/detail.css"/>
    </head>

    <body>
        <div class="container text-center mb-5">
            <h1>This is ASE 230 - <?= $member['name'] ?></h1>
        </div>

        <div class="container">
            <div class="row pb-3">
                <div class="col">
                    <a role="button" class="btn btn-primary" href="index.php">Go Home</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="mb-2">
                        <img class="w-100" src="./asset/img/<?= $member['avatar'] ?>" alt="<?= $member['name'] ?>">
                    </div>

                    <div class="mb-2 d-flex">
                        <h4 class="font-weight-normal"><?= $member['name'] ?></h4>
                        <div class="social d-flex ml-auto">
                            <p class="pr-2 font-weight-normal">Follow on:</p>
                            <a href="#" class="text-muted mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-muted mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-muted mr-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-muted">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mb-2">
                        <ul class="list-unstyled">
                            <li class="media">
                                <span class="w-50 text-black font-weight-normal">Dream profession:</span>
                                <label class="media-body"><?= $member['dream_profession'] ?></label>
                            </li>

                            <li class="media">
                                <span class="w-50 text-black font-weight-normal">Dream company: </span>
                                <label class="media-body"><?= $member['dream_company'] ?></label>
                            </li>
                            <li class="media">
                                <span class="w-50 text-black font-weight-normal">Email: </span>
                                <label class="media-body"><?= $member['email'] ?></label>
                            </li>

                            <li class="media">
                                <span class="w-50 text-black font-weight-normal">Age: </span>
                                <label class="media-body"><?= calculateAge($member['birthdate']) ?></label>
                            </li>

	                        <li class="media">
		                        <span class="w-50 text-black font-weight-normal">Age (Expanded): </span>
		                        <label class="media-body">
			                        <?php $expandedAge = calculateExpandedAge($member['birthdate']);
			                            echo $expandedAge['year'] . ' years, ' . $expandedAge['month'] . ' months, ' . $expandedAge['day'] . ' days'
			                        ?>
		                        </label>
	                        </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 pl-xl-3">
                    <h5 class="font-weight-normal">About Me</h5>
                    <p><?= $member['about'] ?></p>

                    <div class="my-2 bg-light p-2">
                        <p class="font-italic mb-0"><?= $member['quote'] ?></p>
                    </div>

                    <div class="mb-2 mt-2 pt-3">
                        <h5 class="font-weight-normal">Top skills</h5>
                    </div>

                    <div class="pt-3 pb-2">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $member['skill_1_progress'] ?>%" aria-valuenow="<?= $member['skill_1_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar-title"><?= $member['skill_1_name'] ?></div>
                                <span class="progress-bar-number"><?= $member['skill_1_progress'] ?>%</span>
                            </div>
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $member['skill_2_progress'] ?>%" aria-valuenow="<?= $member['skill_2_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar-title"><?= $member['skill_2_name'] ?></div>
                                <span class="progress-bar-number"><?= $member['skill_2_progress'] ?>%</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 pb-3">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $member['skill_3_progress'] ?>%" aria-valuenow="<?= $member['skill_3_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar-title"><?= $member['skill_3_name'] ?></div>
                                <span class="progress-bar-number"><?= $member['skill_3_progress'] ?>%</span>
                            </div>
                        </div>
                    </div>

                    <h5 class="font-weight-normal">Fun Fact:</h5>
                    <p><?= $member['fact'] ?></p>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous"></script>
    </body>
</html>
