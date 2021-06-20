<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;

class Home extends BaseController {
	public function index() {
		$inventaris_model = new InventarisModel();
		$rows = InventarisModel::get_where_batas_pakai_almost_over();

		$summary = [
			'total_inventaris' => $inventaris_model->countAll()
		];

		$data = [
			'title' => 'Beranda',
			'rows_pajak_expired' => $rows,
			'summary' => $summary
		];
		return view('admin/home/index', $data);
	}
}
