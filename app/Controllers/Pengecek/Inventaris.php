<?php

namespace App\Controllers\Pengecek;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\KondisiInventarisModel;

class Inventaris extends BaseController {
	public function index() {
		$inventaris_model = new InventarisModel();
		$rows_inventaris = $inventaris_model->findAll();
		$rows_inventaris = array_map(function($row) {
			$kondisi_inventaris_model = new KondisiInventarisModel();
			$kondisi_inventaris = $kondisi_inventaris_model->where('inventaris_id', $row['id'])->orderBy('id', 'desc')->first();
			$row['kondisi'] = $kondisi_inventaris ? $kondisi_inventaris['kondisi'] : 'baik';
			return $row;
		}, $rows_inventaris);

		$data = [
			'title' => 'Inventaris',
			'rows_inventaris' => $rows_inventaris,
		];

		return view('pengecek/inventaris/index', $data);
	}

	public function view($id) {
		$inventaris_model = new InventarisModel();
		$row_inventaris = $inventaris_model->find($id);

		$data = [
			'title' => 'Data Inventaris',
			'row_inventaris' => InventarisModel::dto($row_inventaris),
		];

		return view('pengecek/inventaris/view', $data);
	}
}
