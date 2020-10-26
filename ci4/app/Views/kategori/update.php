<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<?php
if (!empty(session()->getFlashdata('info'))) {
	echo '<div class="col"><div class="alert alert-danger" role="alert">';
	echo session()->getFlashdata('info');
	echo '</div></div>';
}
?>


<h2 class="col">Update Data</h2>

<div class="col-8">
	<form action="<?= base_url() ?>/admin/kategori/update" method="post" autocomplete="off">
		<div class="form-group">
			<label for="kategori">Kategori</label>
			<input type="text" name="kategori" value="<?= $kategori['kategori'] ?>" required class="form-control">
		</div>
		<div class="form-group">
			<label for="keterangan">Keterangan</label>
			<input type="text" name="keterangan" value="<?= $kategori['keterangan'] ?>" required class="form-control">
		</div>
		<input type="hidden" name="idkategori" value="<?= $kategori['idkategori'] ?>">
		<div class="form-group">
			<input type="submit" name="simpan" value="Save!">
		</div>
	</form>
</div>


<?= $this->endSection(); ?>