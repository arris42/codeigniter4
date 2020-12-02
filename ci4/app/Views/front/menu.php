<?= $this->extend('front/indexed'); ?>
<?= $this->section('content2'); ?>

<?php
if (isset($_GET['one'])) {
	$page = $_GET['one'];
	$jumlah = 3;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>


<div class="row mb-4">
	<?php foreach ($menu as $key => $value) : ?>
		<div class="col-sm-6 col-md-4 col-lg-3 p-0">
			<div class="card mx-2 shadow">
				<img class="card-img-top" src="<?= base_url('/upload/' . $value['gambar']) ?>">
				<div class="card-body">
					<h5 class="card-title"><?= $value['menu'] ?></h5>
					<a href="#" class="btn btn-primary">#info</a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<?= $pager->links('one', 'bootstrap'); ?>


<?= $this->endSection(); ?>