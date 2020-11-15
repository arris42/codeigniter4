<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$db = \Config\Database::connect();
		
		$sql = "SELECT * FROM vorder ORDER BY status ASC";
		$result = $db->query($sql);
		$row = $result->getResult("array");

		$total = count($row);
		$tampil = 4;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
			$sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
		} else {
			$sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
		}

		$result = $db->query($sql);
		$row = $result->getResult("array");

		$data = [
			'order' => $row,
			'pager' => $pager,
			'perPage' => $tampil,
			'total' => $total
		];

		return view('order/select', $data);
	}

}
