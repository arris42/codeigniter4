<?= $this->extend('template/admin'); ?>
<?= $this->section('content1'); ?>

<?php
if (!empty(session()->getFlashdata('info'))) {
	echo '<div class="col"><div class="alert alert-danger" role="alert">';
	$error = session()->getFlashdata('info');

	foreach ($error as $key => $value) {
		echo $key." : ".$value;
		echo "</br>";
	}
	echo '</div></div>';
}
?>


<h2 class="col">Update Data</h2>

<div class="col-8">
	<form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
		<div class="form-group">
			<label for="#">Kategori</label>
			<select class="form-control" onchange="this.form.submit()" name="idkategori" id="idkategori">
				<option value="1">Cari...</option>
				<?php foreach ($kategori as $key => $value) : ?>
					<option <?php if ($value['idkategori'] == $menu['idkategori']) echo "selected" ?> value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="menu">Menu</label>
			<input type="text" name="menu" value="<?= $menu['menu'] ?>" required class="form-control">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="text" name="harga" value="<?= $menu['harga'] ?>" required class="form-control">
		</div>
		<div class="form-group">
			<label for="harga">Gambar</label>
			<input type="file" name="gambar" class="form-control-file">
		</div>
		<input type="hidden" name="gambar" value="<?= $menu['gambar'] ?>" required class="form-control-file">
		<input type="hidden" name="idmenu" value="<?= $menu['idmenu'] ?>" required class="form-control-file">
		<div class="form-group">
			<input type="submit" name="simpan" value="Save!" class="btn btn-primary">
		</div>
	</form>
</div>


<?= $this->endSection(); ?>