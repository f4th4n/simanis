<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PerawatanModel;

class Perawatan extends BaseController {
	public function index() {
		$perawatan_model = new PerawatanModel();
		$rows_perawatan = $perawatan_model->findAll();
		$rows_perawatan_dto = array_map(function($row) {
			return PerawatanModel::dto($row);
		}, $rows_perawatan);

		$data = [
			'title' => 'Laporan Pengecekan',
			'rows_perawatan' => $rows_perawatan_dto,
			'rows_daftar_perawatan' => PerawatanModel::get_daftar_perawatan(),
		];

		return view('admin/perawatan/index', $data);
	}

	public function view($id) {
		$perawatan_model = new PerawatanModel();
		$row_perawatan = $perawatan_model->find($id);

		$data = [
			'title' => 'Data Laporan Pengecekan',
			'row_perawatan' => PerawatanModel::dto($row_perawatan),
		];

		return view('admin/perawatan/view', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$perawatan_model = new PerawatanModel();
		$perawatan_model->delete($id);
	}
}
