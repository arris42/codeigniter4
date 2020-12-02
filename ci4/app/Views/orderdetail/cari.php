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


<div class="d-flex px-3 pt-1 align-items-center">
	<div class="flex-grow-1">
		<h4>Data Rincian Order</h4>
	</div>
</div>

<div class="d-flex mt-3 flex-column">

	<table class="table">
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
			<th>Menu</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total</th>
		</tr>

		<?php foreach ($orderdetail as $key => $value) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $value['tglorder'] ?></td>
				<td><?= $value['menu'] ?></td>
				<td><?= $value['harga'] ?></td>
				<td><?= $value['jumlah'] ?></td>
				<td><?= $value['jumlah'] * $value['harga'] ?></td>
			</tr>
		<?php endforeach; ?>

	</table>

</div>

<div class="mt-3 mb-4 p-2 shadow">
	<h5 class="col pt-2">Filter menurut Tanggal</h5>
	<hr class="hr-item" style="margin: .7rem -.5rem;">
	<form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post" autocomplete="off">
	<div class="row m-0">
		<div class="form-group col-md-6">
			<label for="awal">Mulai</label>
			<input type="date" name="awal" required class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for="sampai">Hingga</label>
			<input type="date" name="sampai" required class="form-control">
		</div>
	</div>
		<div class="pl-3 pb-3">
			<input type="submit" class="btn btn-primary" name="cari" value="Cari">
		</div>
	</form>
</div>




<?= $this->endSection(); ?>