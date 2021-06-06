<?php

namespace App\Models;

use CodeIgniter\Model;

class MutasiModel extends Model {
	protected $table      = 'mutasi';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_mutasi',
		'nama',
	];

	static public function dto($row) {
		return array_merge($row, [
		]);
	}

	static public function rto($request, $is_new) {
		$model = new MutasiModel();
		$rto = [
			'nama' => $request->getPost('nama'),
			'no_seri' => $request->getPost('no-seri'),
			'merk' => $request->getPost('merk'),
			'tanggal_didaftarkan' => date_create_from_format('d-m-Y', $request->getPost('tanggal-didaftarkan'))->format('Y-m-d 0:0:0'),
			'nilai_kekayaan' => $request->getPost('nilai-kekayaan'),
			'lokasi_penempatan' => $request->getPost('lokasi-penempatan'),
			'batas_pakai' => $request->getPost('batas-pakai'),
			'keterangan' => $request->getPost('keterangan'),
		];

		if($is_new) {
			$rto['no_mutasi'] = $model->countAll() + 1;
		} else {
			$rto['id'] = $request->getPost('id');
			$rto['no_mutasi'] = $request->getPost('no-mutasi');
		}

		return $rto;
	}
}
