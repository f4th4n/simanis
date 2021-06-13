<?php

namespace App\Models;

use CodeIgniter\Model;

class KondisiInventarisModel extends Model {
	protected $table = 'kondisi_inventaris';
	protected $useAutoIncrement = true;

	protected $allowedFields = ['inventaris_id', 'kondisi', 'informasi', 'laporan_pengecekan_id', 'user_id'];

	public static function find_by_date($date, $user_id) {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$laporan_pengecekan_model = new LaporanPengecekanModel();

		$where = [
			'tanggal_pengecekan' => $date->format('Y-m-d') . ' 00:00:00',
			'user_id' => session()->get('id'),
		];
		$row_laporan_pengecekan = $laporan_pengecekan_model->where($where)->first();

		if (!$row_laporan_pengecekan) {
			return [];
		}

		$where = ['user_id' => $user_id, 'laporan_pengecekan_id' => $row_laporan_pengecekan['id']];
		$rows = $kondisi_inventaris_model->where($where)->find();
		return $rows;
	}

	public static function dto($row) {
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();

		$user = $user_model->find($row['user_id']);
		$inventaris = $inventaris_model->find($row['inventaris_id']);

		return array_merge($row, [
			'user' => $user,
			'inventaris' => $inventaris,
		]);
	}

	public static function rto($request, $is_new) {
		$model = new KondisiInventarisModel();
		$rto = [
			'no_pengajuan' => $request->getPost('no-pengajuan'),
			'user_id' => $request->getPost('user-id'),
		];

		if (!$is_new) {
			$rto['id'] = $request->getPost('id');
		}

		return $rto;
	}

	public static function upsert_kondisi_inventaris(
		$row_kondisi_inventaris,
		$inventaris_id,
		$kondisi,
		$informasi,
		$laporan_pengecekan_id,
		$user_id
	) {
		$model = new KondisiInventarisModel();

		$data = [
			'inventaris_id' => $inventaris_id,
			'kondisi' => $kondisi,
			'informasi' => $informasi,
			'laporan_pengecekan_id' => $laporan_pengecekan_id,
			'user_id' => $user_id,
		];

		if (!$row_kondisi_inventaris) {
			$model->insert($data);
		} else {
			$model->update($row_kondisi_inventaris['id'], $data);
		}
	}
}
