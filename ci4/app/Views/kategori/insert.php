<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>


<h4>Insert Data</h4>
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



<form action="<?= base_url('/admin/kategori/insert') ?>" method="post" autocomplete="off">
	<div class="form-group">
		<label for="kategori">Kategori</label>
		<input type="text" name="kategori" required class="form-control">
	</div>
	<div class="form-group">
		<label for="keterangan">Keterangan</label>
		<textarea type="text" name="keterangan" required class="form-control"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="simpan" value="Submit" class="btn btn-primary">
	</div>
</form>


<?= $this->endSection(); ?>