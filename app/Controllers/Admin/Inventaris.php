<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Inventaris extends BaseController {
	public function index() {
		$inventaris_model = new \App\Models\InventarisModel();
		$rows_inventaris = $inventaris_model->findAll();

		$data = [
			'rows_inventaris' => $rows_inventaris
		];

		return view('inventaris/index', $data);
	}

	public function view($id) {
		$inventaris_model = new \App\Models\InventarisModel();
		$row_inventaris = $inventaris_model->find($id);

		$data = [
			'row_inventaris' => $row_inventaris
		];

		return view('inventaris/view', $data);
	}

	public function create() {
		$data = [
			'title' => 'Tambah Inventaris'
		];
		return view('inventaris/create', $data);
	}
}
