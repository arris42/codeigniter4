<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>


<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$jumlah = 4;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>

<div class="d-flex px-3 pt-1 align-items-center">
	<div class="flex-grow-1">
		<h4>Data Order</h4>
	</div>
</div>

<div class="d-flex mt-3 flex-column">

	<table class="table">
		<tr>
			<th>No</th>
			<th>ID Order</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
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

				<?php if ($value['status'] == 1) {
					$status = "Lunas";
				} else {
					$status = "<a href=\"" . base_url("/admin/order/find/" . $value['idorder']) . "\"> Bayar </a>";
				} ?>

				<td><?= $status ?></td>
			</tr>
		<?php endforeach; ?>

	</table>

	<?= $pager->makeLinks(1, $perPage, $total, 'bootstrap') ?>

</div>


<?= $this->endSection(); ?>