<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class User extends BaseController
{
	public function index()
	{
		\Config\Services::pager();
		$model = new User_M();

		$limit = 4;
		$data = [
			'limit' => $limit,
			'user' => $model->paginate($limit, 'page'),
			'pager' => $model->pager
		];

		return view("user/select", $data);
	}

	public function create()
	{
		$data = ['level' => ['Admin', 'Koki', 'Kasir']];

		return view('user/insert', $data);
	}

	public function insert()
	{
		if (isset($_POST['password'])) {
			$data = [
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
				'level' => $_POST['level'],
				'aktif' => 1
			];

			$model = new User_M();

			if ($model->insert($data)) {
				return redirect()->to(base_url("/admin/user"));
			} else {
				$error = $model->errors();
				session()->setFlashdata('info', $error['user']);
				return redirect()->to(base_url("/admin/user/create"));
			}
		}
	}

	public function delete($id = null)
	{
		$model = new User_M();
		$model->delete($id);

		return redirect()->to(base_url("/admin/user"));
	}

	public function activate($id = null, $active = 1)
	{
		$model = new User_M();
		if ($active == 0) {
			$active = 1;
		} else {
			$active = 0;
		}

		$data = ['aktif' => $active];

		$model->update($id, $data);
		return redirect()->to(base_url("/admin/user"));
	}

	public function find($id = null)
	{
		$model = new User_M();
		$user = $model->find($id);

		$data = [
			'user'	=> $user,
			'level' => ['Admin', 'Koki', 'Kasir']
		];

		return view("user/update", $data);
	}

	public function ubah()
	{
		$id = $_POST['iduser'];

		$data = [
			'email' => $_POST['email'],
			'level' => $_POST['level']
		];

		$model = new User_M();
		$model->update($id, $data);

		return redirect()->to(base_url("/admin/user"));
	}
}
