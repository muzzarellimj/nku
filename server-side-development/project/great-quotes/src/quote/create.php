<?php
	include_once __DIR__ . '/../collection/author-collection.php';
	include_once __DIR__ . '/../collection/quote-collection.php';
	include __DIR__ . '/../ui/alert.php';

	$alert = null;

	$authorCollection = new AuthorCollection();
	$authors = $authorCollection -> retrieveCollection();

	$quoteCollection = new QuoteCollection();

	if ($_POST) {
		$author = trim($_POST['author']);
		$quote = trim($_POST['quote']);

		if (!$author === null || !$quote === null) {
			$alert = createErrorAlert('We were not able to parse out the information you entered. Please try again.');

		} else {
			$quoteCollection -> createRecord([ $quote, $author ]);

			$alert = createSuccessAlert('Your quote has been added.');
		}
	}
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Create a Quote&ensp;·&ensp;Great Quote</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>

	<body>
		<?php include __DIR__ . '/../ui/header.php' ?>

		<div class="pt-5 container">
			<form action="create.php" method="post">
				<div class="row justify-content-center">
					<div class="col-12">
						<h1 class="display-3 text-center">Create a Quote</h1>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-12 col-md-8 alert-container"><?= $alert ?></div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-lg-4">
						<label for="create-quote-content" class="form-label">Quote</label>
						<textarea id="create-quote-content" name="quote" class="form-control"></textarea>
					</div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-lg-4">
						<label for="create-quote-author" class="form-label">Choose an Author</label>

						<select id="create-quote-author" name="author" class="form-select">
							<option selected> </option>

							<?php
								for ($i = 0; $i < count($authors); $i++) {
									if ($authors[$i]) { ?>
										<option value="<?= $i ?>"><?= $authors[$i][0] ?> <?= $authors[$i][1] ?></option>
									<?php }
								}
							?>
						</select>
					</div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-md-4 text-center">
						<button class="btn btn-primary w-50" type="submit">Create</button>
					</div>
				</div>
			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>