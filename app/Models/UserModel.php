<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
	protected $table      = 'users';
	protected $useAutoIncrement = true;

	protected $allowedFields = [
		'username',
		'password',
		'nama',
		'keterangan',
		'role_id',
	];

	static public function dto($row) {
		return array_merge($row, [
		]);
	}

	static public function rto($request, $is_new) {
		$model = new InventarisModel();
		$rto = [
			'username' => $request->getPost('username'),
			'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
			'nama' => $request->getPost('nama'),
			'keterangan' => $request->getPost('keterangan') ?: '',
			'role_id' => $request->getPost('role_id'),
		];

		if(!$is_new) {
			$rto['id'] = $request->getPost('id');
		}

		return $rto;
	}
}
