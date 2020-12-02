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

<form action="<?= base_url('/admin/user/insert') ?>" method="post" autocomplete="off">
	<div class="form-group">
		<label for="user">User</label>
		<input type="text" name="user" required class="form-control">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" required class="form-control">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" required class="form-control">
	</div>
	<div class="form-group">
		<label for="level">Level</label>
		<select class="form-control" name="level" id="level">
			<?php foreach ($level as $key) : ?>
				<option value="<?= $key ?>"><?= $key ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="simpan" class value="Submit">
	</div>
</form>


<?= $this->endSection(); ?>