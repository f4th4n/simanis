<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model {
	protected $table      = 'inventaris';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_inventaris',
		'nama',
		'no_seri',
		'merk',
		'tanggal_didaftarkan',
		'nilai_kekayaan',
		'lokasi_penempatan',
		'batas_pakai',
		'keterangan',
	];

	static public function dto($row) {
		return array_merge($row, [
			'tanggal_didaftarkan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_didaftarkan'])->format('d-m-Y'),
			'batas_pakai' => date_create_from_format('Y-m-d H:i:s', $row['batas_pakai'])->format('d-m-Y'),
		]);
	}

	static public function rto($request, $is_new) {
		$model = new InventarisModel();
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
			$rto['no_inventaris'] = $model->countAll() + 1;
		} else {
			$rto['id'] = $request->getPost('id');
			$rto['no_inventaris'] = $request->getPost('no-inventaris');
		}

		return $rto;
	}
}
