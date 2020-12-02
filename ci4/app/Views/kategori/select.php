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
		<h4>Kategori</h4>
	</div>
	<a class="btn btn-primary" href="<?= base_url('/admin/kategori/create') ?>" role="button"><i class="fa fa-plus"></i></a>
</div>

<div class="d-flex mt-3 flex-column">

	<table class="table">
		<tr>
			<th>No.</th>
			<th>Kategori</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>

		<?php foreach ($kategori as $key => $value) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $value['kategori'] ?></td>
				<td><?= $value['keterangan'] ?></td>
				<td>
					<a class="btn btn-danger text-white" href="<?= base_url() . "/admin/kategori/delete/" . $value['idkategori'] ?>">
						<i class="fa fa-trash-o" style="font-size:18px;"></i>
					</a>
					<a class="btn btn-info text-white" href="<?= base_url() . "/admin/kategori/find/" . $value['idkategori'] ?>">
						<i class="fa fa-pencil" style="font-size: 18px;"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>

	</table>

	<?= $pager->links('page', 'bootstrap'); ?>

</div>



<?= $this->endSection(); ?>