<!doctype html>

<?php
	$name = 'Michael Muzzarelli';
	$position = 'Full Stack Engineer';
	$company = 'Fidelity';
?>

<?php
	$members = [
		[
			'name' => 'Geralt Bellegarde',
			'position' => 'Witcher',
			'company' => 'Wolf School',
			'avatar' => 'geralt.jpg',

			'dream_profession' => 'Ballet Dancer',
			'dream_company' => 'Dance Company',
			'email' => 'geralt@witcher.com',
			'about' => 'Geralt of Rivia (b. 1160) was a witcher, who was tied to Ciri through the Law of Surprise. While initially reluctant to accept his destiny, Geralt eventually came to terms with his fate. Despite their tumultuous relationship, he also loved the sorceress Yennefer of Vengerberg.',
			'quote' => 'Witchers were made to kill monsters. It doesn\'t matter who posted the notice, the coin has to be right, that\'s all.',
			'fact' => 'During the Trial of the Grasses, Geralt exhibited unusual tolerance for the mutagens that grant witchers their abilities. Accordingly, Geralt was subjected to further experimental mutagens which rendered his hair white and may have given him greater speed, strength, and stamina than his fellow witchers.',

			'skill_1_name' => 'Superhuman Abilities',
			'skill_1_progress' => '100',

			'skill_2_name' => 'Swordsmanship',
			'skill_2_progress' => '100',

			'skill_3_name' => 'Alchemy',
			'skill_3_progress' => '100',
		],

		[
			'name' => 'Michael Muzzarelli',
			'position' => 'Full Stack Engineer',
			'company' => 'Fidelity',
			'avatar' => 'michael.jpg',

			'dream_profession' => 'Full Stack Engineer',
			'dream_company' => 'Fidelity',
			'email' => 'muzzarellm1@nku.edu',
			'about' => 'I am a student researcher and software engineer at PodScholars, and junior at Northern Kentucky University. I am from Saint Louis, MO and moved to NKY to attend NKU.',
			'quote' => 'It is the quality of one\'s convictions that determines success, not the number of followers.',
			'fact' => 'I used to be a librarian and was on track to attend school for IT in some capacity in preparation to attend a Master of Librarian and Information Science program. I still read when I can find the time, but it mostly means I a compulsion to buy books I will never have time to read and I have to own several bookcases to store them all on.',

			'skill_1_name' => 'Front-End Technologies',
			'skill_1_progress' => '70',

			'skill_2_name' => 'Back-End Technologies',
			'skill_2_progress' => '55',

			'skill_3_name' => 'Machine Learning',
			'skill_3_progress' => '10',
		],

		[
			'name' => 'Jaskier Pankratz',
			'position' => 'Bard',
			'company' => 'Everywhere',
			'avatar' => 'jaskier.jpg',

			'dream_profession' => 'Geralt\'s Partner',
			'dream_company' => 'Partners R Us',
			'email' => 'jaskier@witcher.com',
			'about' => 'Julian Alfred Pankratz, Viscount de Lettenhove better known as Jaskier (b. 1222), was a bard and a close friend of Geralt of Rivia.',
			'quote' => 'Toss a coin to your Witcher',
			'fact' => 'Jaskier and Geralt left the mountains, having been released by Filavandrel. In return, Geralt gave them the 150 ducats he was paid to kill Torque. In this adventure, Jaskier had gained a newfound respect for Filavandrel. They survived the Great Cleansing once. Maybe they could do it again. Jaskier started to sing a tune while Geralt followed alongside.',

			'skill_1_name' => 'Lute Playing',
			'skill_1_progress' => '100',

			'skill_2_name' => 'Singing',
			'skill_2_progress' => '100',

			'skill_3_name' => 'Songwriting',
			'skill_3_progress' => '100',
		]
	];

	$member = $_GET['member'];
?>

<html lang="en">
	<head>
		<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>ASE 230 - <?= $members[$member]['name'] ?></title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>
		<link rel="stylesheet" href="assets/css/detail.css"/>
	</head>

	<body>
		<div class="container text-center mb-5">
			<h1>This is ASE 230 - <?= $members[$_GET['member']]['name'] ?></h1>
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
						<img class="w-100" src="./assets/img/<?= $members[$member]['avatar'] ?>" alt="<?= $members[$member]['name'] ?>">
					</div>

					<div class="mb-2 d-flex">
						<h4 class="font-weight-normal"><?= $members[$member]['name'] ?></h4>
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
								<label class="media-body"><?= $members[$member]['dream_profession'] ?></label>
							</li>

							<li class="media">
								<span class="w-50 text-black font-weight-normal">Dream company: </span>
								<label class="media-body"><?= $members[$member]['dream_company'] ?></label>
							</li>
							<li class="media">
								<span class="w-50 text-black font-weight-normal">Email: </span>
								<label class="media-body"><?= $members[$member]['email'] ?></label>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-7 col-md-6 pl-xl-3">
					<h5 class="font-weight-normal">About Me</h5>
					<p><?= $members[$member]['about'] ?></p>

					<div class="my-2 bg-light p-2">
						<p class="font-italic mb-0"><?= $members[$member]['quote'] ?></p>
					</div>

					<div class="mb-2 mt-2 pt-3">
						<h5 class="font-weight-normal">Top skills</h5>
					</div>

					<div class="pt-3 pb-2">
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= $members[$member]['skill_1_progress'] ?>%" aria-valuenow="<?= $members[$member]['skill_1_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar-title"><?= $members[$member]['skill_1_name'] ?></div>
								<span class="progress-bar-number"><?= $members[$member]['skill_1_progress'] ?>%</span>
							</div>
						</div>
					</div>

					<div class="py-2">
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= $members[$member]['skill_2_progress'] ?>%" aria-valuenow="<?= $members[$member]['skill_2_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar-title"><?= $members[$member]['skill_2_name'] ?></div>
								<span class="progress-bar-number"><?= $members[$member]['skill_2_progress'] ?>%</span>
							</div>
						</div>
					</div>

					<div class="pt-2 pb-3">
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= $members[$member]['skill_3_progress'] ?>%" aria-valuenow="<?= $members[$member]['skill_3_progress'] ?>" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-bar-title"><?= $members[$member]['skill_3_name'] ?></div>
								<span class="progress-bar-number"><?= $members[$member]['skill_3_progress'] ?>%</span>
							</div>
						</div>
					</div>

					<h5 class="font-weight-normal">Fun Fact:</h5>
					<p><?= $members[$member]['fact'] ?></p>
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