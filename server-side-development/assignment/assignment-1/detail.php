<!doctype html>

<?php
	$name = 'Michael Muzzarelli';
	$position = 'Full Stack Engineer';
	$company = 'Fidelity';
?>

<html lang="en">
	<head>
		<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>ASE 230 - <?= $name ?></title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>
		<link rel="stylesheet" href="assets/css/detail.css"/>
	</head>

	<body>
		<div class="container text-center mb-5">
			<h1>This is ASE 230 - <?= $name ?></h1>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6">
					<div class="mb-2">
						<img class="w-100" src="assets/img/michael-muzzarelli.jpg" alt="<?= $name ?>">
					</div>

					<div class="mb-2 d-flex">
						<h4 class="font-weight-normal"><?= $name ?></h4>
						<div class="social d-flex ml-auto">
							<p class="pr-2 font-weight-normal">Follow on:</p>
							<a href="https://www.facebook.com/muzzarellimj/" class="text-muted mr-1">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="https://twitter.com/muzzarellimj" class="text-muted mr-1">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="https://www.instagram.com/muzzarellimj/" class="text-muted mr-1">
								<i class="fab fa-instagram"></i>
							</a>
							<a href="https://www.linkedin.com/in/muzzarellimj/" class="text-muted">
								<i class="fab fa-linkedin"></i>
							</a>
						</div>
					</div>

					<div class="mb-2">
						<ul class="list-unstyled">
							<li class="media">
								<span class="w-50 text-black font-weight-normal">Dream profession:</span>
								<label class="media-body"><?= 'Full stack software engineer' ?></label>
							</li>

							<li class="media">
								<span class="w-50 text-black font-weight-normal">Dream company: </span>
								<label class="media-body"><?= 'Fidelity' ?></label>
							</li>
							<li class="media">
								<span class="w-50 text-black font-weight-normal">Email: </span>
								<label class="media-body"><?= 'muzzarellm1@nku.edu' ?> </label>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-7 col-md-6 pl-xl-3">
					<h5 class="font-weight-normal">About Me</h5>
					<p><?= 'I am a '.$position.' at '.$company.', student researcher and software engineer at PodScholars, and junior at Northern Kentucky University. I am from Saint Louis, MO and moved to NKY to attend NKU.' ?></p>

					<div class="my-2 bg-light p-2">
						<p class="font-italic mb-0"><?= 'It is the quality of one\'s convictions that determines success, not the number of followers.' ?></p>
					</div>
					<div class="mb-2 mt-2 pt-3">
						<h5 class="font-weight-normal">Top skills</h5>
					</div>
					<div class="pt-3 pb-2">
						<div class="progress">
							<?php $serverside_progress = '70' ?>
							<div class="progress-bar" role="progressbar" style="width: <?= $serverside_progress ?>%" aria-valuenow="<?= $serverside_progress ?>" aria-valuemin="0"
							     aria-valuemax="100">
								<div class="progress-bar-title"><?= 'Server-Side Technologies (Node.js, Java, etc.)' ?></div>
								<span class="progress-bar-number"><?= $serverside_progress ?>%</span>
							</div>
						</div>
					</div>

					<div class="py-2">
						<div class="progress">
							<?php $clientside_progress = '60' ?>
							<div class="progress-bar" role="progressbar" style="width:  <?= $clientside_progress ?>%" aria-valuenow="<?= $clientside_progress ?>" aria-valuemin="0"
							     aria-valuemax="100">
								<div class="progress-bar-title"><?= 'Client-Side Technologies (Bootstrap, Tailwind, etc.)' ?></div>
								<span class="progress-bar-number"><?= $clientside_progress ?>%</span>
							</div>
						</div>
					</div>

					<div class="pt-2 pb-3">
						<div class="progress">
							<?php $ux_progress = '45' ?>
							<div class="progress-bar" role="progressbar" style="width: <?= $ux_progress ?>%" aria-valuenow="<?= $ux_progress ?>" aria-valuemin="0"
							     aria-valuemax="100">
								<div class="progress-bar-title"><?= 'User Experience Design' ?></div>
								<span class="progress-bar-number"><?= $ux_progress ?>%</span>
							</div>
						</div>
					</div>

					<h5 class="font-weight-normal">Fun Fact:</h5>
					<p><?= 'I used to be a librarian and was on track to attend school for IT in some capacity in preparation to attend a Master of Librarian and Information Science program. I still read when I can find the time, but it mostly means I a compulsion to buy books I will never have time to read and I have to own several bookcases to store them all on.' ?></p>
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