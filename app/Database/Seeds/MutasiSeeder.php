<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\MutasiModel;
use App\Models\UserModel;
use App\Models\InventarisModel;
use CodeIgniter\Test\Fabricator;
use Faker\Factory;

class MutasiSeeder extends Seeder {
	public function run() {
		$model = new MutasiModel();
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();
		$faker = Factory::create('id_ID');

		for($i = 0; $i < 3; $i++) {
			$data = [
				'inventaris_id' => $inventaris_model->first()['id'],
				'no_mutasi' => $model->countAll() + 1,
				'tanggal_mutasi' => $faker->dateTimeBetween('-2 month', '-1 days')->format('Y-m-d') . ' 00:00:00',
				'lokasi_awal' => $faker->company,
				'lokasi_tujuan' => $faker->company,
				'keterangan' => $faker->company,
			];

			$this->db->table('mutasi')->insert($data);
			echo 'Create mutasi with no_mutasi ' . $data['no_mutasi'] . "\n";
		}
	}
}
