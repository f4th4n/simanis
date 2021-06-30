<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;

class NilaiKekayaan extends BaseController {
	public function index() {
		$inventaris_model = new InventarisModel();
		$rows_inventaris = $inventaris_model->findAll();

		$data = [
			'title' => 'Nilai Kekayaan',
			'rows_inventaris' => $rows_inventaris,
			'count_nilai_kekayaan' => 200,
			'count_inventaris' => $inventaris_model->countAll(),
		];

		return view('admin/nilai_kekayaan/index', $data);
	}
}