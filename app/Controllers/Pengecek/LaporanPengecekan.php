<?php

namespace App\Controllers\Pengecek;

use App\Controllers\BaseController;
use App\Models\LaporanPengecekanModel;
use App\Models\KondisiInventarisModel;
use App\Models\InventarisModel;

class LaporanPengecekan extends BaseController {
	public function index() {
		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$rows_laporan_pengecekan = $laporan_pengecekan_model->findAll();
		$rows_laporan_pengecekan_dto = array_map(function ($row) {
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
			'user_id' => session()->get('id'),
		];
		return view('pengecek/laporan_pengecekan/create', $data);
	}

	public function delete($id) {
		if (!$id) {
			return;
		}

		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$laporan_pengecekan_model->delete($id);
	}

	public function start() {
		$tanggal = $this->request->getPost('tanggal-pengecekan');
		return redirect()->to('/admin/pengecek/laporan-pengecekan/fill/' . $tanggal);
	}

	public function fill($tanggal) {
		$inventaris_model = new InventarisModel();
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$laporan_pengecekan_model = new LaporanPengecekanModel();

		$date = date_create_from_format('d-m-Y', $tanggal);
		$user_id = session()->get('id');

		$rows = KondisiInventarisModel::find_by_date($date, $user_id);

		$rows_dto = array_map(function ($row) {
			return KondisiInventarisModel::dto($row);
		}, $rows);

		$data = [
			'title' => 'Pengecekan',
			'rows' => $rows_dto,
			'count_all' => $inventaris_model->countAll(),
		];
		return view('pengecek/laporan_pengecekan/fill', $data);
	}
}
