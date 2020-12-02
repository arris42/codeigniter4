<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<?php
if (isset($_GET['page_page'])) {
	$page = $_GET['page_page'];
	$jumlah = 3;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>


<div class="d-flex px-3 align-items-center">
	<div class="flex-grow-1">
		<h4>Menu</h4>
	</div>
	<form action="<?= base_url('/admin/menu/read') ?>" method="get" class="mr-4">
		<?= view_cell('\App\Controllers\Admin\Menu::option') ?>
	</form>
		<a class="btn btn-primary" href="<?= base_url('/admin/menu/create') ?>" role="button"><i class="fa fa-plus"></i></a>
</div>

<div class="d-flex mt-3 flex-column">

		<table class="table">
			<tr>
				<th>No.</th>
				<th>Menu</th>
				<th>Foto</th>
				<th>Harga</th>
				<th>Aksi</th>
			</tr>

			<?php foreach ($menu as $key => $value) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value['menu'] ?></td>
					<td><img style="width:6rem;" src="<?= base_url('/upload/' . $value['gambar']) ?>"></td>
					<td><?= number_format($value['harga']) ?></td>
					<td>
						<a href="<?= base_url() . "/admin/menu/delete/" . $value['idmenu'] ?>">
							<img src="<?= base_url('/icon/trash.svg') ?>" alt="">
						</a>
						<a href="<?= base_url() . "/admin/menu/find/" . $value['idmenu'] ?>">
							<img src="<?= base_url('/icon/pencil.svg') ?>" alt="">
						</a>
					</td>
				</tr>
			<?php endforeach; ?>

		</table>

		<?= $pager->links('page', 'bootstrap'); ?>

</div>



<?= $this->endSection(); ?>