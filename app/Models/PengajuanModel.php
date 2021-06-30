<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model {
	protected $table = 'pengajuan';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_pengajuan',
		'user_id',
		'tanggal_pengajuan',
		'nama_inventaris',
		'total',
		'keterangan'
	];

	static public function dto($row) {
		return array_merge($row, [
			'tanggal_pengajuan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_pengajuan'])->format('d-m-Y'),
		]);
	}

	static public function rto($request, $is_new) {
		$model = new PengajuanModel();
		$rto = [
			'user_id' => $request->getPost('user-id'),
			'tanggal_pengajuan' => date_create_from_format('d-m-Y', $request->getPost('tanggal-pengajuan'))->format('Y-m-d 0:0:0'),
			'nama_inventaris' => $request->getPost('nama-inventaris'),
			'total' => $request->getPost('total'),
			'keterangan' => $request->getPost('keterangan'),
		];

		if ($is_new) {
			$rto['no_pengajuan'] = $model->countAll() + 1;
		} else {
			$rto['id'] = $request->getPost('id');
			$rto['no_pengajuan'] = $request->getPost('id');
		}

		return $rto;
	}
}
