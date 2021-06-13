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

	static public function rto($request, $tanggal) {
		$model = new LaporanPengecekanModel();
		$rto = [
			'no_pengajuan' => $model->countAll() + 1,
			'user_id' => session()->get('id'),
			'tanggal_pengecekan' => $tanggal->format('Y-m-d 0:0:0'),
		];

		return $rto;
	}

	public static function find_by_date($date) {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$laporan_pengecekan_model = new LaporanPengecekanModel();

		$row_laporan_pengecekan = $laporan_pengecekan_model
			->where('tanggal_pengecekan', $date->format('Y-m-d') . ' 00:00:00')
			->first();

		return $row_laporan_pengecekan;
	}
}
