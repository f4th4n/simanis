<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratPerintahModel extends Model {
	protected $table = 'surat_perintah';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_surat',
		'tanggal_terbit',
		'to_user',
		'perintah',
		'tanggal_pelaksanaan',
	];

	static public function dto($row) {
		$user_model = new UserModel;
		$user = $user_model->find($row['to_user']);

		return array_merge($row, [
			'tanggal_terbit' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_terbit'])->format('d-m-Y'),
			'tanggal_pelaksanaan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_pelaksanaan'])->format('d-m-Y'),
			'user' => $user,
		]);
	}

	static public function rto($request, $is_new) {
		$model = new SuratPerintahModel();
		$rto = [
			'tanggal_terbit' => date_create_from_format('d-m-Y', $request->getPost('tanggal-terbit'))->format('Y-m-d 0:0:0'),
			'to_user' => $request->getPost('to-user'),
			'perintah' => $request->getPost('perintah'),
			'tanggal_pelaksanaan' => date_create_from_format('d-m-Y', $request->getPost('tanggal-pelaksanaan'))->format('Y-m-d 0:0:0'),
		];

		if ($is_new) {
			$rto['no_surat'] = $model->countAll() + 1;
		} else {
			$rto['id'] = $request->getPost('id');
			$rto['no_surat'] = $request->getPost('id');
		}

		return $rto;
	}
}
