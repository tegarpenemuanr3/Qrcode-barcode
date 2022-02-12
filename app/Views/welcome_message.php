<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" style="box-shadow: 0 6.4px 14.4px 0 rgb(0 0 0 / 13%), 0 1.2px 3.6px 0 rgb(0 0 0 / 11%);">
		<div class="container">
			<a class="navbar-brand" href="#">QRcode & Barcode</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= site_url('home/index') ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= site_url('home/mahasiswa') ?>">Data Mahasiswa</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container pt-5">
		<div class="row p-5">
			<div class="col text-center">
				<h1>QRcode</h1>
				<img src="data:image/png;base64,<?= $QRcode ?>" alt="QRcode">
			</div>
			<div class="col text-center">
				<h1>Barcode</h1>
				<img src="data:image/png;base64,<?= $barcode ?>" alt="Barcode">
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>