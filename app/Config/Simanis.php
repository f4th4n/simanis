<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Simanis extends BaseConfig {
	public $app_name = 'SI MANIS';

	public $roles = [
		'admin' => [
			'id' => 1,
			'name' => 'Admin',
			'value' => 'admin'
		],
		'pengecek' => [
			'id' => 2,
			'name' => 'Bag. Pengecekan',
			'value' => 'pengecek'
		],
		'pemimpin' => [
			'id' => 3,
			'name' => 'Pemimpin',
			'value' => 'pemimpin'
		],
	];

	public $kondisi = [
		'baik', 'kurang_baik', 'rusak'
	];
}
