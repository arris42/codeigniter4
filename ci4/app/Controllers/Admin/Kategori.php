<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		// echo "<h1>Belajar CI-4</h1>";
		// return view('welcome_message');
	}

	public function read()
	{
		$paging = \Config\Services::pager();
		$model = new Kategori_M();
		// $kategori = $model->findAll();

		$limit = 4;
		$data = [
			'limit' => $limit,
			'kategori'	=> $model->paginate($limit, 'page'),
			'pager'		=> $model->pager
		];

		return view("kategori/select", $data);
	}

	public function create()
	{
		return view("kategori/insert");
	}

	public function insert()
	{
		$model = new Kategori_M();

		if ($model->insert($_POST)) {
			return redirect()->to(base_url("/admin/kategori"));
		} else {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/create"));
		}
	}

	public function find($id = null)
	{
		$model = new Kategori_M();
		$kategori = $model->find($id);

		$data = [
			'kategori' => $kategori
		];

		return view("kategori/update", $data);
	}

	public function update()
	{
		$model = new Kategori_M();
		$id = $_POST['idkategori'];

		if ($model->save($_POST) == false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/find/$id"));
		} else {
			return redirect()->to(base_url("/admin/kategori"));
		}
	}

	public function delete($id = null)
	{
		$model = new Kategori_M();
		$model->delete($id);

		return redirect()->to(base_url("/admin/kategori"));
	}

	//--------------------------------------------------------------------

}
