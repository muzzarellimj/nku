<?php
	include_once __DIR__ . '/../collection/author-collection.php';
	include_once __DIR__ . '/../collection/quote-collection.php';

	$authorCollection = new AuthorCollection();
	$authors = $authorCollection -> retrieveCollection();

	$authorPosition = $_GET['author'] ?? rand(0, count($authors) - 1);
	$author = $authors[$authorPosition];

	$quoteCollection = new QuoteCollection();
	$quotes = $quoteCollection -> retrieveCollection();
	$authorQuotes = array_filter($quotes, function ($quote) use ($authorPosition) { return $quote[1] == $authorPosition; });
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Author Details&ensp;·&ensp;Great Quote</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>

	<body>
		<?php include __DIR__ . '/../ui/header.php' ?>

		<div class="pt-5 container">
			<div class="row justify-content-center">
				<div class="col-12">
					<h1 class="display-3 text-center">Author Details</h1>
				</div>
			</div>

			<div class="row justify-content-center pt-5">
				<div class="col-12 col-md-8">
					<h1 class="display-5 text-center"><?= $author[0] ?> <?= $author[1] ?></h1>
				</div>
			</div>

			<div class="row row-cols-1 row-col-sm-2 row-cols-md-3 justify-content-around pt-5">
				<?php foreach ($authorQuotes as $authorQuotePosition => $authorQuote) {
					[ $quote, $author ] = $authorQuote; ?>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><?= $quote ?></h5>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>
