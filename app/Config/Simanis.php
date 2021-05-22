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
		'pemimpin' => [
			'id' => 2,
			'name' => 'Pemimpin',
			'value' => 'pemimpin'
		],
		'bag_pengecekan' => [
			'id' => 3,
			'name' => 'Bag. Pengecekan',
			'value' => 'bag_pengecekan'
		]
	];
}
