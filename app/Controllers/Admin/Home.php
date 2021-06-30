<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\KondisiInventarisModel;
use App\Models\PerawatanModel;


class Home extends BaseController {
	public function index() {
		$inventaris_model = new InventarisModel();
		$rows = InventarisModel::get_where_batas_pakai_almost_over();

		$summary = [
			'total_inventaris' => $inventaris_model->countAll(),
			'kondisi_baik' => KondisiInventarisModel::countByKondisi('baik'),
			'kondisi_kurang_baik' => KondisiInventarisModel::countByKondisi('kurang_baik'),
			'kondisi_rusak' => KondisiInventarisModel::countByKondisi('rusak'),
			'total_kekayaan' => number_format_short(InventarisModel::total_kekayaan())
		];

		$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

		$data = [
			'title' => 'Beranda',
			'rows_pajak_expired' => $rows,
			'summary' => $summary,
			'stats' => [
				(int) PerawatanModel::count_by_month(1, $year) ?: 0,
				(int) PerawatanModel::count_by_month(2, $year) ?: 0,
				(int) PerawatanModel::count_by_month(3, $year) ?: 0,
				(int) PerawatanModel::count_by_month(4, $year) ?: 0,
				(int) PerawatanModel::count_by_month(5, $year) ?: 0,
				(int) PerawatanModel::count_by_month(6, $year) ?: 0,
				(int) PerawatanModel::count_by_month(7, $year) ?: 0,
				(int) PerawatanModel::count_by_month(8, $year) ?: 0,
				(int) PerawatanModel::count_by_month(9, $year) ?: 0,
				(int) PerawatanModel::count_by_month(10, $year) ?: 0,
				(int) PerawatanModel::count_by_month(11, $year) ?: 0,
				(int) PerawatanModel::count_by_month(12, $year) ?: 0,
			]
		];
		return view('admin/home/index', $data);
	}
}
