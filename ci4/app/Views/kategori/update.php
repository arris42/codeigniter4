<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<h4>Update Data</h4>
<hr class="hr-item">

<?php
if (!empty(session()->getFlashdata('info'))) {
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
	echo session()->getFlashdata('info');
	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>';
	echo '</div>';
}
?>



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
		<input type="submit" name="simpan" value="Submit" class="btn btn-primary">
	</div>
</form>


<?= $this->endSection(); ?>