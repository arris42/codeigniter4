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
	<form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
		<div class="form-group">
			<label for="#">Kategori</label>
			<select class="form-control" onchange="this.form.submit()" name="idkategori" id="idkategori">
				<option value="1">Cari...</option>
				<?php foreach ($kategori as $key => $value) : ?>
					<option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="menu">Menu</label>
			<input type="text" name="menu" required class="form-control">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="number" name="harga" required class="form-control">
		</div>
		<div class="form-group">
			<label for="harga">Gambar</label>
			<input type="file" name="gambar" required class="form-control-file">
		</div>
		<div class="form-group">
			<input type="submit" name="simpan" value="Save!" class="btn btn-primary">
		</div>
	</form>
</div>


<?= $this->endSection(); ?>