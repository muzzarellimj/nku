<?php
	include_once __DIR__ . '/../collection/author-collection.php';
	include_once __DIR__ . '/../collection/quote-collection.php';

	$authorCollection = new AuthorCollection();
	$authors = $authorCollection -> retrieveCollection();

	$quoteCollection = new QuoteCollection();
	$quotes = $quoteCollection -> retrieveCollection();
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Quotes&ensp;·&ensp;Great Quote</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>

	<body>
		<?php include __DIR__ . '/../ui/header.php' ?>

		<div class="pt-5 container">
			<div class="row row-cols-1 row-col-sm-2 row-cols-md-3 justify-content-around">
				<?php for ($i = 0; $i < count($quotes); $i++) { ?>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><?= $quotes[$i][0] ?></h5>
								<h6 class="card-subtitle my-3 text-muted">Author: <?= $authors[$quotes[$i][1]][0] ?> <?= $authors[$quotes[$i][1]][1] ?></h6>
								<a href="detail.php?quote=<?= $i ?>" class="btn btn-sm btn-primary w-100">Learn More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>
