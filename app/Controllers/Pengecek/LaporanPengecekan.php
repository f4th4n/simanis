<?php

namespace App\Controllers\Pengecek;

use App\Controllers\BaseController;
use App\Models\LaporanPengecekanModel;

class LaporanPengecekan extends BaseController {
	public function index() {
		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$rows_laporan_pengecekan = $laporan_pengecekan_model->findAll();
		$rows_laporan_pengecekan_dto = array_map(function($row) {
			return LaporanPengecekanModel::dto($row);
		}, $rows_laporan_pengecekan);

		$data = [
			'title' => 'Laporan Pengecekan',
			'rows_laporan_pengecekan' => $rows_laporan_pengecekan_dto,
		];

		return view('pengecek/laporan_pengecekan/index', $data);
	}

	public function view($id) {
		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$row_laporan_pengecekan = $laporan_pengecekan_model->find($id);

		$data = [
			'title' => 'Data Laporan Pengecekan',
			'row_laporan_pengecekan' => LaporanPengecekanModel::dto($row_laporan_pengecekan),
		];

		return view('pengecek/laporan_pengecekan/view', $data);
	}

	public function create() {
		$laporan_pengecekan_model = new LaporanPengecekanModel();

		$data = [
			'title' => 'Isi Form Buat Laporan',
			'current_index' => $laporan_pengecekan_model->countAll() + 1,
			'user_id' => session()->get('id')
		];
		return view('pengecek/laporan_pengecekan/create', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$laporan_pengecekan_model->delete($id);
	}

	public function start() {
		echo 'f';
		return ['ok'];
	}
}
