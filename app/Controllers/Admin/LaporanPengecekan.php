<?php

namespace App\Controllers\Admin;

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

		return view('admin/laporan_pengecekan/index', $data);
	}

	public function view($id) {
		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$row_laporan_pengecekan = $laporan_pengecekan_model->find($id);

		$data = [
			'title' => 'Data Laporan Pengecekan',
			'row_laporan_pengecekan' => LaporanPengecekanModel::dto($row_laporan_pengecekan),
		];

		return view('admin/laporan_pengecekan/view', $data);
	}

	public function delete($id) {
		if (!$id) {
			return;
		}

		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$laporan_pengecekan_model->delete($id);

		$kondisi_inventaris_model = new KondisiInventarisModel();
		$kondisi_inventaris_model->where('laporan_pengecekan_id', $id)->delete();
	}

	public function kondisiInventaris($laporan_pengecekan_id) {
		$inventaris_model = new InventarisModel();
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$laporan_pengecekan_model = new LaporanPengecekanModel();

		$user_id = session()->get('id');

		$rows = $kondisi_inventaris_model->where('laporan_pengecekan_id', $laporan_pengecekan_id)->find();

		$rows_dto = array_map(function ($row) {
			return KondisiInventarisModel::dto($row);
		}, $rows);

		$data = [
			'title' => 'Pengecekan',
			'rows' => $rows_dto,
			'count_all' => $inventaris_model->countAll(),
			'tanggal' => '-',
		];
		return view('pengecek/laporan_pengecekan/fill', $data);
	}
}
