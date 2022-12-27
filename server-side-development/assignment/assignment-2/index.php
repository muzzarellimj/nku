<!doctype html>

<?php
	$class = 'ASE 230 - Class of Fall 2022';

	$members = [
		[
			'name' => 'Geralt Bellegarde',
			'position' => 'Witcher',
			'company' => 'Wolf School',
			'avatar' => 'geralt.jpg',
			'year' => 'Senior'
		],

		[
			'name' => 'Michael Muzzarelli',
			'position' => 'Full Stack Engineer',
			'company' => 'Fidelity',
			'avatar' => 'michael.jpg',
			'year' => 'Senior'
		],

		[
			'name' => 'Jaskier Pankratz',
			'position' => 'Bard',
			'company' => 'Everywhere',
			'avatar' => 'jaskier.jpg',
			'year' => 'Junior'
		]
	];
?>

<html lang="en">
	<head>
		<!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title><?= $class ?></title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="assets/css/index.css"/>
	</head>

	<body>
		<div class="container text-center">
			<h1>This is <?= $class ?></h1>
		</div>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-8 col-lg-6">
					<!-- Section Heading-->
					<div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
					     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
						<h3>Our Creative <span> Team</span></h3>
						<p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
						<div class="line"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
					for ($i = 0; $i < count($members); $i++) { ?>
						<div class="col-12 col-sm-6 col-lg-3">
							<div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
							     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">

								<!-- Team Thumb-->
								<div class="advisor_thumb">
									<a href="detail.php?member=<?= $i ?>">
										<img src="./assets/img/<?= $members[$i]['avatar'] ?>" style="height: 315px; border-radius: 10px" alt="<?= $members[$i]['name'] ?>">
									</a>

									<!-- Social Info-->
									<div class="social-info">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#/"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>

								<!-- Team Details-->
								<div class="single_advisor_details_info">
									<h6><?= $members[$i]['name'] ?>&ensp;·&ensp;<?= $members[$i]['year'] ?></h6>
									<p class="designation"><?= $members[$i]['position'] ?> @ <?= $members[$i]['company'] ?></p>
								</div>
							</div>
						</div>
				<?php } ?>
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