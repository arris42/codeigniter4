<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>


<div class="row">
	<div class="col">
		<h3>Data Order</h3>
	</div>
</div>

<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$jumlah = 3;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>


<div class="row">

	<div class="col">
		<table class="table">
			<tr>
				<th>No</th>
				<th>ID Order</th>
				<th>Pelanggan</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Total</th>
				<th>Bayar</th>
				<th>Kembali</th>
				<th>Status</th>
			</tr>

			<?php foreach ($order as $key => $value) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value['idorder'] ?></td>
					<td><?= $value['pelanggan'] ?></td>
					<td><?= $value['tglorder'] ?></td>
					<td><?= $value['total'] ?></td>
					<td><?= $value['bayar'] ?></td>
					<td><?= $value['kembali'] ?></td>
					<?php if ($value['kembali']==1) {
						$status="Lunas";
					} else {
						$status="Bayar";
					} ?>
					<td><?= $status ?></td>
				</tr>
			<?php endforeach; ?>

		</table>

		<?= $pager->makeLinks(1, $perPage, $total, 'bootstrap') ?>
	</div>

</div>


<?= $this->endSection(); ?>