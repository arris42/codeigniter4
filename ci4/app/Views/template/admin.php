<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/bootstrap/custom-color.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<title>Admin Page</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light dashboard-header shadow fixed-top">
		<a class="navbar-brand py-3 header-item" href="<?= base_url('/admin') ?>">Administration Page</a>
		<button class="navbar-toggler header-button" type="button" data-toggle="collapse" data-target="#idnavbarNav"
			aria-controls="idnavbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end bg-white" id="idnavbarNav">
			<ul class="navbar-nav w-50 justify-content-evenly">
				<li class="nav-item py-1 header-item">User :
					<?php if (!empty(session()->get('user'))) {
					echo session()->get('user');
				} ?>
				</li>
				<li class="nav-item py-1 header-item">Email :
					<?php if (!empty(session()->get('email'))) {
					echo session()->get('email');
				} ?>
				</li>
				<li class="nav-item py-1 header-item">Level :
					<div class="badge badge-primary">
						<?php if (!empty(session()->get('level'))) {
						echo session()->get('level');
						$level = session()->get('level');
					} ?>
					</div>
				</li>
			</ul>
			<a class="btn btn-outline-danger my-2 header-button" href="<?= base_url('/admin/login/logout') ?>">Logout <i
					class="fa fa-sign-out" style="font-size:1.1em;"></i></a>
		</div>
	</nav>

	<!-- Fix Whitespace on right side body by giving "m-0" -->
	<!-- Whitespace space caused by "row" and "col" grid css -->
	<div class="content m-0">
		<div class="sidebar bg-5">
			<ul class="list-group list-group-flush bg-5 px-3">
				<div class="py-3">
				<?php if ($level === "Admin") : ?>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/kategori') ?>"><i class="fa fa-fw fa-th-large pr-2"></i>Kategori</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/menu') ?>"><i class="fa fa-fw fa-bars pr-2"></i>Menu</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/pelanggan') ?>"><i class="fa fa-fw fa-users pr-2"></i>Pelanggan</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/order') ?>"><i class="fa fa-fw fa-list pr-2"></i>Order</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/orderdetail') ?>"><i class="fa fa-fw fa-list-alt pr-2"></i>Order Detail</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/user') ?>"><i class="fa fa-fw fa-user pr-2"></i>User</a>
				<?php endif ?>

				<?php if ($level === "Kasir") : ?>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/order') ?>"><i class="fa fa-fw fa-list pr-2"></i>Order</a>
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/orderdetail') ?>"><i class="fa fa-fw fa-list-alt pr-2"></i>Order Detail</a>
				<?php endif ?>

				<?php if ($level === "Koki") : ?>
				<!-- <li class="list-group-item p-0 sidebar-item"> -->
					<a class="list-group-item sidebar-item pl-3" href="<?= base_url('/admin/orderdetail') ?>"><i class="fa fa-fw fa-list-alt pr-2"></i>Order Detail</a>
				<!-- </li> -->
				<?php endif ?>
				</div>
			</ul>
		</div>
		<div class="main-dashboard bg-1 px-4">
			<div class="px-4 py-3 my-3 bg-white shadow radius">
				<?php $this->renderSection('content1') ?>
			</div>
		</div>
	</div>



	<script src="<?= base_url('/bootstrap/js/jquery-slim.min.js') ?>"></script>
	<script src="<?= base_url('/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>