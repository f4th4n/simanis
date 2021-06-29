<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model {
	protected $table      = 'perawatan';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'user_id',
		'inventaris_id',
		'nomor_perawatan',
		'tanggal_perawatan',
		'tanggal_selesai',
		'tempat_perawatan',
		'biaya_perawatan',
		'foto_kwitansi',
		'keterangan',
	];

	static public function get_daftar_perawatan() {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$where = ['baik'];
		$rows_kondisi_inventaris = $kondisi_inventaris_model->whereNotIn('kondisi', $where)->find();

		$rows_kondisi_inventaris = array_map(function ($row) {
			return KondisiInventarisModel::dto($row);
		}, $rows_kondisi_inventaris);
		
		return $rows_kondisi_inventaris;
	}

	static public function dto($row) {
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();

		$user = $user_model->find($row['user_id']);
		$inventaris = $inventaris_model->find($row['inventaris_id']);

		return array_merge($row, [
			'tanggal_perawatan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_perawatan'])->format('d-m-Y'),
			'tanggal_selesai' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_selesai'])->format('d-m-Y'),
			'user' => $user,
			'inventaris' => $inventaris,
		]);
	}

	static public function rto($request, $is_new) {
		$model = new PerawatanModel();
		$rto = [
			'no_pengajuan' => $request->getPost('no-pengajuan'),
			'user_id' => $request->getPost('user-id'),
		];

		if(!$is_new) {
			$rto['id'] = $request->getPost('id');
		}

		return $rto;
	}
}
