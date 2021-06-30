<?php

namespace App\Controllers\Pengecek;

use App\Controllers\BaseController;
use App\Models\SuratPerintahModel;

class SuratPerintah extends BaseController {
	public function index() {
		$surat_perintah_model = new SuratPerintahModel();
		$rows_surat_perintah = $surat_perintah_model->findAll();
		$rows_surat_perintah = array_map(function($row) {
			return SuratPerintahModel::dto($row);
		}, $rows_surat_perintah);

		$data = [
			'title' => 'Nilai Kekayaan',
			'rows_surat_perintah' => $rows_surat_perintah,
		];

		return view('pengecek/surat_perintah/index', $data);
	}
}