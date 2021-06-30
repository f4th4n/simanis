<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\KondisiInventarisModel;


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

		$data = [
			'title' => 'Beranda',
			'rows_pajak_expired' => $rows,
			'summary' => $summary
		];
		return view('admin/home/index', $data);
	}
}
