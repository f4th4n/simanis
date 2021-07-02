<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model {
	protected $table = 'inventaris';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'no_inventaris',
		'nama',
		'no_seri',
		'merk',
		'warna',
		'tanggal_didaftarkan',
		'nilai_kekayaan',
		'lokasi_penempatan',
		'batas_pakai',
		'keterangan',
		'foto',
		'pesan',
	];

	public static function dto($row) {
		return array_merge($row, [
			'tanggal_didaftarkan' => date_create_from_format('Y-m-d H:i:s', $row['tanggal_didaftarkan'])->format(
				'd-m-Y'
			),
			'batas_pakai' => date_create_from_format('Y-m-d H:i:s', $row['batas_pakai'])->format('d-m-Y'),
		]);
	}

	public static function rto($request, $is_new) {
		$model = new InventarisModel();
		$rto = [
			'nama' => $request->getPost('nama'),
			'no_seri' => $request->getPost('no-seri'),
			'warna' => $request->getPost('warna'),
			'merk' => $request->getPost('merk'),
			'tanggal_didaftarkan' => date_create_from_format('d-m-Y', $request->getPost('tanggal-didaftarkan'))->format(
				'Y-m-d 0:0:0'
			),
			'nilai_kekayaan' => $request->getPost('nilai-kekayaan'),
			'lokasi_penempatan' => $request->getPost('lokasi-penempatan'),
			'batas_pakai' => date_create_from_format('d-m-Y', $request->getPost('batas-pakai'))->format('Y-m-d 0:0:0'),
			'keterangan' => $request->getPost('keterangan'),
			'pesan' => $request->getPost('pesan'),
		];

		if ($is_new) {
			$rto['no_inventaris'] = $model->countAll() + 1;
		} else {
			$rto['id'] = $request->getPost('id');
			$rto['no_inventaris'] = $request->getPost('id');
		}

		return $rto;
	}

	public static function get_where_batas_pakai_almost_over() {
		$day = 4;
		$sql =
			'
			SELECT * FROM `inventaris` 
			WHERE `batas_pakai` < (curdate() + interval ' .
			$day .
			' day)
			ORDER BY `batas_pakai`
		';

		$db = db_connect();
		$rows = $db->query($sql);
		$rows = $rows->getResult();

		foreach ($rows as $row) {
			$test = date_create_from_format('Y-m-d H:i:s', $row->batas_pakai);
			$today = new \DateTime();
			$today->setTime(23, 59, 59);
			$row->status = $test < $today ? 'expired' : 'almost';
		}

		return $rows;
	}

	public static function total_kekayaan() {
		$db = db_connect();
		$sql = 'SELECT SUM(nilai_kekayaan) AS total FROM `inventaris`';

		$row = $db->query($sql)->getRow();
		return $row->total;
	}
}
