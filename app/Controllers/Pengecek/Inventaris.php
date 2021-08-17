<?php

namespace App\Controllers\Pengecek;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\KondisiInventarisModel;
use App\Models\PerawatanModel;

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

		$perawatan_model = new PerawatanModel();
		$rows_perawatan = $perawatan_model->where('inventaris_id', $id)->orderBy('id', 'desc')->findAll();
		$rows_perawatan_dto = array_map(function($row) {
			return PerawatanModel::dto($row);
		}, $rows_perawatan);

		$data = [
			'title' => 'Data Inventaris',
			'row_inventaris' => InventarisModel::dto($row_inventaris),
			'rows_perawatan' => $rows_perawatan_dto,
		];

		return view('pengecek/inventaris/view', $data);
	}
}
