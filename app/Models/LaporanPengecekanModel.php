<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanPengecekanModel extends Model {
	protected $table      = 'laporan_pengecekan';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_pengajuan',
		'user_id',
		'tanggal_pengecekan',
	];

	static public function dto($row) {
		$user_model = new UserModel();
		$user = $user_model->find($row['user_id']);

		return array_merge($row, [
			'tanggal_pengecekan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_pengecekan'])->format('d-m-Y'),
			'user_name' => $user['nama']
		]);
	}

	static public function rto($request, $is_new) {
		$model = new LaporanPengecekanModel();
		$rto = [
			'no_pengajuan' => $request->getPost('no-pengajuan'),
			'user_id' => $request->getPost('user-id'),
			'tanggal_pengecekan' => $request->getPost('tanggal-pengecekan'),
		];

		if(!$is_new) {
			$rto['id'] = $request->getPost('id');
		}

		return $rto;
	}
}
