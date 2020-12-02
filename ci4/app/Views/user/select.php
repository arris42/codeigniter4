<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<?php
if (isset($_GET['page_page'])) {
	$page = $_GET['page_page'];
	$jumlah = $limit;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>


<div class="d-flex px-3 align-items-center">
	<div class="flex-grow-1">
		<h4>Data User</h4>
	</div>
	<a class="btn btn-primary" href="<?= base_url('/admin/user/create') ?>" role="button"><i class="fa fa-plus"></i></a>
</div>

<div class="row mt-2">

	<div class="col">
		<table class="table">
			<tr>
				<th>No.</th>
				<th>User</th>
				<th>Email</th>
				<th>Level</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>

			<?php foreach ($user as $key => $value) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value['user'] ?></td>
					<td><?= $value['email'] ?></td>
					<td><?= $value['level'] ?></td>

					<?php if ($value['aktif'] == 1) $aktif = "AKTIF";
					else $aktif = "BANNED"; ?>
					<td><a href="<?= base_url() . "/admin/user/activate/" . $value['iduser'] . "/" . $value['aktif'] ?>"><?= $aktif; ?></a></td>
					<td>
						<a href="<?= base_url() . "/admin/user/delete/" . $value['iduser'] ?>">
							<img src="<?= base_url('/icon/trash.svg') ?>" alt="">
						</a>
						<a href="<?= base_url() . "/admin/user/find/" . $value['iduser'] ?>">
							<img src="<?= base_url('/icon/pencil.svg') ?>" alt="">
						</a>
					</td>
				</tr>
			<?php endforeach; ?>

		</table>

		<?= $pager->links('page', 'bootstrap'); ?>
	</div>

</div>



<?= $this->endSection(); ?>