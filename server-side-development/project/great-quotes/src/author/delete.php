<?php

include __DIR__ . '/../ui/alert.php';

include_once __DIR__ . '/../collection/collection-util.php';
include_once __DIR__ . '/../collection/author-collection.php';
include_once __DIR__ . '/../collection/quote-collection.php';

# define alert
$alert = null;

# define alert messages
$alertMessageSuccess = 'This author and all quotes attributed to them have been deleted. <a class="fw-bold text-reset" href="../quote/index.php">Go back home?</a>';
$alertMessageError = 'We were unable to find the selected author. <a class="fw-bold text-reset" href="../quote/index.php">Go back home?</a>';

# determine whether document should be rendered
$render = false;

# determine whether confirmation parameter is present
$confirmation = $_GET['confirmation'] ?? false;

# instantiate author collection and set null author collection content
$authorCollection = new AuthorCollection();
$authorCollectionContent = null;

# instantiate quote collection and set null quote collection content
$quoteCollection = new QuoteCollection();
$quoteCollectionContent = null;

# validate author position
$authorPosition = $_GET['author'] ?? null;
$authorPosition = ($authorPosition !== null) ? intval($authorPosition) : null;

# define author container and appropriate attributes
$author = null; $authorName = null; $authorQuoteCount = 0;

if ($authorPosition === null) {
	$alert = createErrorAlert($alertMessageError);

} else {
	# CONFIRMATION: delete author and display success message
	if ($confirmation) {
		$deleteResult = deleteRecordCascade($authorPosition, $authorCollection, $quoteCollection);

		if (!$deleteResult) {
			$alert = createErrorAlert($alertMessageError);

		} else {
			$alert = createSuccessAlert($alertMessageSuccess);
		}

	# DEFAULT: show standard document content
	} else {
		$authorCollectionContent = $authorCollection -> retrieveCollection();
		$author = $authorCollectionContent[$authorPosition] ?? null;

		if (!$author) {
			$alert = createErrorAlert($alertMessageError);

		} else {
			[ $firstname, $lastname ] = $author;

			$quoteCollectionContent = $quoteCollection -> retrieveCollection();
			$quoteCollectionContent = array_filter($quoteCollectionContent, function ($quote) use ($authorPosition) { return $quote[1] == $authorPosition; });

			$authorName = $firstname . ' ' . $lastname;
			$authorQuoteCount = count($quoteCollectionContent);

			$render = true;
		}
	}
}

?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Delete an Author&ensp;·&ensp;Reader</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<link rel="stylesheet" href="../../asset/css/style.css">

		<link rel="shortcut icon" href="../../asset/img/favicon.png" type="image/x-icon">
		<link rel="icon" href="../../asset/img/favicon.png" type="image/x-icon">
	</head>

	<body>
		<?php include __DIR__ . '/../ui/header.php' ?>

		<div class="header text-center">
			<div class="container pt-4">
				<div class="row">
					<div class="col-lg-9 mx-auto">
						<h1 class="mb-4">Delete an Author</h1>
						<p>Before we continue, we need you to confirm that you want to delete this author. Press the confirmation button below to proceed with deletion and be returned to the main menu.</p>
					</div>
				</div>
			</div>

			<svg class="header-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none"
			     xmlns="http://www.w3.org/2000/svg">
				<path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z"
				      stroke="#040306"
				      stroke-miterlimit="10"/>
				<path class="path"
				      d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z"/>
				<path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z"
				      stroke="#040306"
				      stroke-miterlimit="10"/>
			</svg>


			<svg class="header-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none"
			     xmlns="http://www.w3.org/2000/svg">
				<g filter="url(#filter0_d)">
					<path class="path"
					      d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z"/>
					<path
							d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
							stroke="#040306" stroke-miterlimit="10"/>
				</g>
				<defs>
					<filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979"
					        filterUnits="userSpaceOnUse"
					        color-interpolation-filters="sRGB">
						<feFlood flood-opacity="0" result="BackgroundImageFix"/>
						<feColorMatrix in="SourceAlpha" type="matrix"
						               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
						<feOffset dy="4"/>
						<feGaussianBlur stdDeviation="2"/>
						<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
						<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
						<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
					</filter>
				</defs>
			</svg>


			<svg class="header-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none"
			     xmlns="http://www.w3.org/2000/svg">
				<path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z"
				      stroke="#040306"
				      stroke-miterlimit="10"/>
				<path class="path"
				      d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z"/>
				<path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z"
				      stroke="#040306"
				      stroke-miterlimit="10"/>
			</svg>


			<svg class="header-border" height="240" viewBox="0 0 2202 240" fill="none"
			     xmlns="http://www.w3.org/2000/svg">
				<path
						d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
						stroke-width="2"/>
			</svg>
		</div>

		<?php if (!$render) { ?>

		<div class="container">
			<div class="row justify-content-center py-3">
				<div class="col-12 col-md-10 col-xl-8">
					<?= $alert ?>
				</div>
			</div>
		</div>

		<?php } else { ?>

		<div class="author pt-5 pb-4">
			<div class="container">
				<div class="row no-gutters justify-content-center align-items-center">
					<div class="col-md-8 col-lg-6 text-center">
						<h3 class="mb-2"><?= $authorName ?></h3>
						<div class="content">
							<p>We know of&ensp;<span class="text-primary"><?= $authorQuoteCount ?></span>&ensp;quote(s) attributed to this author.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="section-sm py-4">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-xl-8 mx-auto pb-4">
						<p class="text-center">Please note that pressing the confirmation button below will delete this author and all quotes attributed to them.</p>
					</div>

					<div class="col-lg-8 mx-auto">
						<form action="delete.php?author=<?= $authorPosition ?>&confirmation=true" method="post">
							<div class="row justify-content-around">
								<div class="col-12 col-sm-5">
									<button type="button" onclick="window.location.href='index.php'" class="btn btn-secondary w-100">Go Back</button>
								</div>

								<div class="col-12 col-sm-5">
									<button type="submit" class="btn btn-primary w-100">Confirm</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<?php } ?>

		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		<script src="../../asset/js/script.js"></script>
	</body>
</html>