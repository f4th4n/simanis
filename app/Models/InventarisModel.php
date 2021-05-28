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
}
