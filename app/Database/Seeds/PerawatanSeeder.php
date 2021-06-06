<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PerawatanModel;
use App\Models\UserModel;
use App\Models\InventarisModel;
use CodeIgniter\Test\Fabricator;
use Faker\Factory;

class PerawatanSeeder extends Seeder {
	public function run() {
		$model = new PerawatanModel();
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();
		$faker = Factory::create('id_ID');

		for($i = 0; $i < 10; $i++) {
			$data = [
				'user_id' => $user_model->first()['id'],
				'inventaris_id' => $inventaris_model->first()['id'],
				'nomor_perawatan' => $model->countAll() + 1,
				'tanggal_perawatan' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d H:i:s'),
				'tanggal_selesai' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d H:i:s'),
				'tempat_perawatan' => $faker->company,
				'biaya_perawatan' => $faker->numberBetween(1000, 9000000),
				'foto_kwitansi' => 'https://source.unsplash.com/random',
				'keterangan' => $faker->company,
			];

			$this->db->table('perawatan')->insert($data);
			echo 'Create perawatan' . "\n";
		}
	}
}
