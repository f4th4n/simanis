<?php

namespace App\Models;

use CodeIgniter\Model;

class MutasiModel extends Model {
	protected $table      = 'mutasi';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'inventaris_id',
		'no_mutasi',
		'tanggal_mutasi',
		'lokasi_awal',
		'lokasi_tujuan',
		'keterangan',
	];

	static public function dto($row) {
		return array_merge($row, [
		]);
	}

	static public function rto($request, $is_new) {
		$model = new MutasiModel();
		$rto = [
			'inventaris_id' => $request->getPost('inventaris-id'),
			'tanggal_mutasi' => date_create_from_format('d-m-Y', $request->getPost('tanggal-mutasi'))->format('Y-m-d 0:0:0'),
			'lokasi_awal' => $request->getPost('lokasi-awal'),
			'lokasi_tujuan' => $request->getPost('lokasi-tujuan'),
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
