<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder {
	public function run() {
		$admin = [
			'username' => 'admin1',
			'nama' => 'Admin Satu',
			'password' => password_hash('admin1', PASSWORD_DEFAULT),
			'role_id' => config('Simanis')->roles['admin']['id']
		];

		$pemimpin = [
			'username' => 'pemimpin1',
			'nama' => 'Pemimpin Satu',
			'password' => password_hash('pemimpin1', PASSWORD_DEFAULT),
			'role_id' => config('Simanis')->roles['pemimpin']['id']
		];

		$bag_pengecekan = [
			'username' => 'bagpengecekan1',
			'nama' => 'Bag. Pengecekan Satu',
			'password' => password_hash('bagpengecekan1', PASSWORD_DEFAULT),
			'role_id' => config('Simanis')->roles['pengecek']['id']
		];

		$this->db->table('users')->replace($admin);
		$this->db->table('users')->replace($pemimpin);
		$this->db->table('users')->replace($bag_pengecekan);
	}
}
