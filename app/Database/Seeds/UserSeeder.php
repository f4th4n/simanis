<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder {
	public function run() {
		$admin = [
			'username' => 'admin1',
			'nama' => 'Admin Satu',
			'password' => sha1('admin1'),
			'role_id' => config('Simanis')->roles['admin']['id']
		];

		$pemimpin = [
			'username' => 'pemimpin1',
			'nama' => 'Pemimpin Satu',
			'password' => sha1('pemimpin1'),
			'role_id' => config('Simanis')->roles['pemimpin']['id']
		];

		$bag_pengecekan = [
			'username' => 'bagpengecekan1',
			'nama' => 'Bag. Pengecekan Satu',
			'password' => sha1('bagpengecekan1'),
			'role_id' => config('Simanis')->roles['bag_pengecekan']['id']
		];

		$this->db->table('users')->replace($admin);
		$this->db->table('users')->replace($pemimpin);
		$this->db->table('users')->replace($bag_pengecekan);
	}
}
