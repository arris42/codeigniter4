<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom-color.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<title>NT Aura Rest</title>
</head>

<body>
	<nav class="navbar navbar-light dashboard-header shadow fixed-top">
		<a class="navbar-brand py-3 header-item" href="<?= base_url() ?>">NT Aura Rest</a>
		<button class="navbar-toggler header-button" type="button" data-toggle="collapse" data-target="#sidebarSide" aria-controls="sidebarSide" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- <div class="collapse navbar-collapse justify-content-end bg-white" id="idnavbarNav">
			<ul class="navbar-nav w-50 justify-content-evenly">
			</ul>
		</div> -->
	</nav>

	<!-- Fix Whitespace on right side body by giving "m-0" -->
	<!-- Whitespace space caused by "row" and "col" grid css -->
	<div class="content m-0">
		<div class="collapse sidebar bg-5" id="sidebarSide">
			<ul class="navbar-nav list-group list-group-flush bg-5 px-3">
				<div class="py-3">
					<div style="color: white;font-weight: bold;font-size: .75em;background-color: transparent;border: 0;" class="list-group-item pl-3 pb-0">KATEGORI</div>
					<hr class="bg-white">
					<?php foreach ($kategori as $key) : ?>
						<a class="list-group-item sidebar-item pl-3" href="<?php base_url('/' . strtolower($key)) ?>"><?= $key ?></a>
					<?php endforeach ?>
				</div>
			</ul>
		</div>
		<div class="main-dashboard bg-1 px-4">
			<div class="px-4 py-3 my-3 bg-white shadow radius">
				<?php $this->renderSection('content2') ?>
			</div>
		</div>
	</div>



	<script src="<?= base_url('/bootstrap/js/jquery-slim.min.js') ?>"></script>
	<script src="<?= base_url('/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>




	<!-- CSS DEBUGGING -->

	<!-- <div class="position-relative d-inline-block">
		<div class="d-inline position-fixed" style="bottom: 0;">
			<button class="btn btn-danger" id="ghostcss" onclick="ghostCSS()">Debug CSS</button>
			<button class="btn btn-info" id="ghostcss" onclick="refresh()">Refresh</button>
		</div>
	</div>
	<script>
		function ghostCSS() {
			document.body.innerHTML += "<style>*{background: #000 !important;color: #0f0 !important;outline: solid #f00 1.2px !important;}</style>";
		};

		function refresh() {
			location.reload();
		}
	</script> -->

</body>

</html>