<?php
	include_once __DIR__ . '/../collection/author-collection.php';
	include __DIR__ . '/../ui/alert.php';

	$alert = null;
	$author = null;
	$first = null; $last = null;
	$disable = null;

	$authorCollection = new AuthorCollection();
	$authorId = $_GET['author'] ?? null;

	if ($_POST) {
		if ($authorId === null) {
			$alert = createErrorAlert('We were unable to update the author you selected. Please try again.');
			$disable = 'disabled';

		} else {
			$first = $_POST['first'] ?? null;   $last = $_POST['last'] ?? null;

			if (!$first || !$last) {
				$alert = createErrorAlert('We were unable to update the author you selected. Please try again.');
				$disable = 'disabled';

			} else {
				$authorCollection -> updateRecord($authorId, [ $first, $last ]);

				$alert = createSuccessAlert('The author you selected has been updated.');
			}
		}
	}

	if ($authorId === null) {
		$alert = createErrorAlert('We were unable to find the author you selected. Please try again.');
		$disable = 'disabled';

	} else {
		$authorSet = $authorCollection -> retrieveCollection();
		$author = $authorSet[intval($authorId)] ?? null;

		if ($author === null) {
			$alert = createErrorAlert('We were unable to find the author you selected. Please try again.');
			$disable = 'disabled';

		} else {
			[ $first, $last ] = $author;
		}
	}
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Revise an Author&ensp;·&ensp;Great Quote</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>

	<body>
		<?php include __DIR__ . '/../ui/header.php' ?>

		<div class="pt-5 container">
			<form action="modify.php?author=<?= intval($authorId) ?>" method="post">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 alert-container"><?= $alert ?></div>
				</div>

				<div class="row justify-content-center">
					<div class="col-12">
						<h1 class="display-3 text-center">Create an Author</h1>
					</div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-lg-4">
						<label for="create-author-first" class="form-label">First Name</label>
						<input id="create-author-first" name="first" value="<?= $first ?? '' ?>" class="form-control" type="text">
					</div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-lg-4">
						<label for="create-author-last" class="form-label">Last Name</label>
						<input id="create-author-last" name="last" value="<?= $last ?? '' ?>" class="form-control" type="text">
					</div>
				</div>

				<div class="row justify-content-center pt-4">
					<div class="col-12 col-sm-6 col-md-4 text-center">
						<button class="btn btn-primary w-50 <?= $disable ?>" type="submit">Update</button>
					</div>
				</div>
			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>