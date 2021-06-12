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
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$user = $user_model->find($row['user_id']);

		$curr_user_id = session()->get('id');
		$curr_user = $user_model->find($curr_user_id);
		$where_for_jumlah_data = ['laporan_pengecekan_id' => $row['id']];

		if($curr_user['role_id'] === 'pengecek') {
			$where_for_jumlah_data['user_id'] = $curr_user_id;
		}

		return array_merge($row, [
			'tanggal_pengecekan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_pengecekan'])->format('d-m-Y'),
			'user_name' => $user['nama'],
			'jumlah_data' => $kondisi_inventaris_model->where($where_for_jumlah_data)->countAllResults()
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
