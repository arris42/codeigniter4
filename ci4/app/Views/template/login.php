<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom-color.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom.css') ?>">
	<title>Signin Page</title>
</head>

<body class="bg-1">

	<div class="container">
		<div class="row mt-5">
			<div class="col-5 mx-auto p-4 bg-white shadow">
				<div class="col">
					<?php
					if (!empty($info)) {
						echo '<div class="col"><div class="alert alert-danger" role="alert">';
						echo $info;
						echo '</div></div>';
					}
					?>
				</div>
				<span>
					<h4>Administrative Page</h4>
					<hr class="hr-item mt-3">
				</span>
				<form action="<?= base_url('/admin/login') ?>" method="post" autocomplete="off">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" required class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" required class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="login" value="Login">
					</div>
				</form>
			</div>

		</div>
	</div>

	<!-- <script src="<?= base_url('/bootstrap/js/jquery-slim.min.js') ?>"></script> -->
	<!-- <script src="<?= base_url('/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> -->
</body>

</html>