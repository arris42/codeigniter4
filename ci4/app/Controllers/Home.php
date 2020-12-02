<?php

namespace App\Controllers;

use \App\Models\Kategori_M;
use App\Models\Menu_M;

class Home extends BaseController
{
	public function index()
	{
		\Config\Services::renderer();
		\Config\Services::pager();
		$model_k = new Kategori_M();
		$model_m = new Menu_M();

		$data = [
			'kategori' => $model_k->findColumn('kategori'),
			'menu' => $model_m->paginate(4, 'one'),
			'pager' => $model_m->pager
		];


		return view('front/menu', $data);
	}

	//--------------------------------------------------------------------

}
