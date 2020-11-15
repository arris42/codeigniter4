<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Pelanggan extends BaseController
{
	public function index()
	{
		$paging = \Config\Services::pager();
		$model = new Pelanggan_M();
		// $kategori = $model->findAll();

		$limit = 4;
		$data = [
			'limit' => $limit,
			'pelanggan'	=> $model->paginate($limit, 'page'),
			'pager'		=> $model->pager
		];

		return view('pelanggan/select', $data);
	}

	public function delete($id=null)
	{
		$model = new Pelanggan_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pelanggan"));
	}

	public function update($id=null, $active=1)
	{
		$model = new Pelanggan_M();
		if ($active == 0) {
			$active = 1;
		} else {
			$active = 0;
		}

		$data = ['aktif' => $active];

		$model->update($id, $data);
		return redirect()->to(base_url("/admin/pelanggan"));
	}

}
