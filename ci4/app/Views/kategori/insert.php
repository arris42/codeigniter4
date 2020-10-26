<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<?php
if (!empty(session()->getFlashdata('info'))) {
	echo '<div class="col"><div class="alert alert-danger" role="alert">';
	echo session()->getFlashdata('info');
	echo '</div></div>';
}
?>


<h2 class="col">Insert Data</h2>

<div class="col-8">
	<form action="<?= base_url('/admin/kategori/insert') ?>" method="post" autocomplete="off">
		<div class="form-group">
			<label for="kategori">Kategori</label>
			<input type="text" name="kategori" required class="form-control">
		</div>
		<div class="form-group">
			<label for="keterangan">Keterangan</label>
			<input type="text" name="keterangan" required class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="simpan" value="Save!">
		</div>
	</form>
</div>


<?= $this->endSection(); ?>