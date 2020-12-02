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


<form action="<?= base_url('/admin/user/ubah') ?>" method="post" autocomplete="off">
	<input type="hidden" value="<?= $user['iduser'] ?>" name="iduser" required class="form-control">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" value="<?= $user['email'] ?>" name="email" required class="form-control">
	</div>
	<div class="form-group">
		<label for="level">Level</label>
		<select class="form-control" name="level" id="level">
			<?php foreach ($level as $key) : ?>
				<option <?php if ($user['level'] == $key) echo "selected"; ?> value="<?= $key ?>"><?= $key ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="simpan" value="Submit" class="btn btn-primary">
	</div>
</form>


<?= $this->endSection(); ?>