<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model {
	protected $table = 'perawatan';
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
		'keterangan',
		'kondisi_inventaris_id',
	];

	public static function get_daftar_perawatan() {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$where = ['baik'];
		$rows_kondisi_inventaris = $kondisi_inventaris_model
			->whereNotIn('kondisi', $where)
			->orderBy('id', 'desc')
			->find();

		/*
			$rows_kondisi_inventaris = $kondisi_inventaris_model
				->select('kondisi_inventaris.*, perawatan.id, kondisi_inventaris.id as id')
				->whereNotIn('kondisi_inventaris.kondisi', $where)
				->join('perawatan', 'perawatan.kondisi_inventaris_id = kondisi_inventaris.id', 'left')
				->orderBy('kondisi_inventaris.id', 'desc')
				->find();
		*/

		$rows_kondisi_inventaris = array_map(function ($row) {
			return KondisiInventarisModel::dto($row);
		}, $rows_kondisi_inventaris);

		return $rows_kondisi_inventaris;
	}

	public static function dto($row) {
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();
		$kondisi_inventaris_model = new KondisiInventarisModel();

		$user = $user_model->find($row['user_id']);
		$inventaris = $inventaris_model->find($row['inventaris_id']);
		$kondisi_inventaris = $kondisi_inventaris_model->find($row['kondisi_inventaris_id']);

		return array_merge($row, [
			'tanggal_perawatan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_perawatan'])->format('d-m-Y'),
			'tanggal_selesai' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_selesai'])->format('d-m-Y'),
			'user' => $user,
			'inventaris' => $inventaris,
			'kondisi_inventaris' => $kondisi_inventaris,
		]);
	}

	public static function rto($request, $kondisi_inventaris_id, $is_new) {
		$model = new PerawatanModel();
		$rto = [
			'kondisi_inventaris_id' => $kondisi_inventaris_id,
			'user_id' => $request->getPost('user-id'),
			'inventaris_id' => $request->getPost('inventaris-id'),
			'nomor_perawatan' => $model->countAll() + 1,
			'tanggal_perawatan' => date_create_from_format('d-m-Y', $request->getPost('tanggal-perawatan'))->format(
				'Y-m-d 0:0:0'
			),
			'tanggal_selesai' => date_create_from_format('d-m-Y', $request->getPost('tanggal-selesai'))->format(
				'Y-m-d 0:0:0'
			),
			'tempat_perawatan' => $request->getPost('tempat-perawatan'),
			'biaya_perawatan' => $request->getPost('biaya-perawatan'),
			'keterangan' => $request->getPost('keterangan'),
		];

		if (!$is_new) {
			$rto['id'] = $request->getPost('id');
		}

		return $rto;
	}

	public static function count_by_month($month, $year) {
		$db = db_connect();
		$sql = '
			SELECT SUM(biaya_perawatan) AS total FROM `perawatan`
			WHERE YEAR(tanggal_perawatan) = '.$year.' AND MONTH(tanggal_perawatan) = '.$month.'
		';

		$row = $db->query($sql)->getRow();
		return $row->total;
	}
}
