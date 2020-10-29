<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Menu extends BaseController
{
	public function index()
	{
		$paging = \Config\Services::pager();
		$model = new Menu_M();

		$limit = 4;
		$data = [
			'limit' => $limit,
			'judul'	=> 'Data Menu',
			'menu'	=> $model->paginate($limit, 'page'),
			'pager'		=> $model->pager
		];

		return view("menu/select", $data);
	}

	public function read()
	{
		$pager = \Config\Services::pager();
		if (isset($_GET['idkategori'])) {
			$id = $_GET['idkategori'];

			$model = new Menu_M();
			$jumlah = $model->where('idkategori', $id)->findAll();
			$count = count($jumlah);

			$tampil = 3;
			$mulai = 0;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			$menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'judul'	=> 'Data Pencarian Menu',
				'menu'	=> $menu,
				'pager'	=> $pager,
				'tampil' => $tampil,
				'total'	=> $count
			];

			return view("menu/cari", $data);
		}
	}

	public function create()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();
		$data = [
			'kategori'	=> $kategori
		];
		return view("menu/update", $data);
	}

	public function find($id = null)
	{
		$model_menu = new Menu_M();
		$model_kategori = new Kategori_M();
		$menu = $model_menu->find($id);
		$kategori = $model_kategori->findAll();

		$data = [
			'menu'		=> $menu,
			'kategori'	=> $kategori
		];

		return view("menu/update", $data);
	}

	public function update()
	{
		$id = $this->request->getPost('idmenu');
		$file = $this->request->getFile('gambar');
		$name = $file->getName();

		if (empty($name)) {
			$name = $this->request->getPost('gambar');
		} else {
			$file->move('./upload');
		}


		$data = [
			'idkategori'	=> $this->request->getPost('idkategori'),
			'menu'			=> $this->request->getPost('menu'),
			'gambar'		=> $name,
			'harga'			=> $this->request->getPost('harga')
		];

		$model = new Menu_M();
		$model->update($id, $data);
		return redirect()->to(base_url('/admin/menu'));
	}

	public function insert()
	{
		$request = \Config\Services::request();
		$file = $request->getFile('gambar');
		$name = $file->getName();

		$data = [
			'idkategori'	=> $request->getPost('idkategori'),
			'idmenu'		=> $request->getPost('idmenu'),
			'gambar'		=> $name,
			'harga'			=> $request->getPost('harga')
		];

		$model = new Menu_M();
		$model->insert($data);
		$file->move('./upload');
		return redirect()->to(base_url("/admin/menu"));


		// if ($model->insert($_POST)) {
		// 	return redirect()->to(base_url("/admin/kategori"));
		// } else {
		// 	$error = $model->errors();
		// 	session()->setFlashdata('info', $error['kategori']);
		// 	return redirect()->to(base_url("/admin/kategori/create"));
		// }
	}

	public function option()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();
		$data = [
			'kategori'	=> $kategori
		];

		return view('template/option', $data);
	}

	public function delete($id = null)
	{
		$model = new Menu_M();
		$model->delete($id);

		return redirect()->to(base_url("/admin/menu"));
	}
}
