<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\LaporanPengecekanModel;
use App\Models\UserModel;
use CodeIgniter\Test\Fabricator;
use Faker\Factory;

class LaporanPengecekanSeeder extends Seeder {
	public function run() {
		$model = new LaporanPengecekanModel();
		$user_model = new UserModel();
		$faker = Factory::create('id_ID');

		for($i = 0; $i < 10; $i++) {
			$data = [
				'no_pengajuan' => $model->countAll() + 1,
				'user_id' => $user_model->first()['id'],
				'tanggal_pengecekan' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d H:i:s')
			];

			$this->db->table('laporan_pengecekan')->insert($data);
			echo 'Create laporan_pengecekan with no_pengajuan ' . $data['no_pengajuan'] . "\n";
		}
	}
}
