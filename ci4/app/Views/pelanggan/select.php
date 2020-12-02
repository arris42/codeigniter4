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
		<h4>Data Pelanggan</h4>
	</div>
</div>

<div class="d-flex mt-3 flex-column">

	<table class="table">
		<tr>
			<th>No.</th>
			<th>Pelanggan</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>Aksi</th>
			<th>Status</th>
		</tr>

		<?php foreach ($pelanggan as $key => $value) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $value['pelanggan'] ?></td>
				<td><?= $value['alamat'] ?></td>
				<td><?= $value['notelepon'] ?></td>
				<td><?= $value['email'] ?></td>
				<td>
					<a href="<?= base_url() . "/admin/pelanggan/delete/" . $value['idpelanggan'] ?>">
						<img src="<?= base_url('/icon/trash.svg') ?>" alt="">
					</a>
				</td>
				<?php 
					if ($value['aktif']==1) {
						$aktif="Aktif";
					} else {
						$aktif="Nonaktif";
					}
				?>
				<td>
					<a href="<?= base_url() . "/admin/pelanggan/update/" . $value['idpelanggan'] ."/". $value['aktif'] ?>"><?= $aktif; ?></a>
				</td>
			</tr>
		<?php endforeach; ?>

	</table>

	<?= $pager->links('page', 'bootstrap'); ?>

</div>



<?= $this->endSection(); ?>