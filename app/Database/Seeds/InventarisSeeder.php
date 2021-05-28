<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\InventarisModel;
use CodeIgniter\Test\Fabricator;
use Faker\Factory;

class InventarisSeeder extends Seeder {
	public function run() {
		$model = new InventarisModel();
		$faker = Factory::create('id_ID');

		for($i = 0; $i < 10; $i++) {
			$data = [
				'no_inventaris' => $model->countAll() + 1,
				'nama' => $faker->company,
				'no_seri' => $faker->firstName,
				'merk' => $faker->firstName,
				'tanggal_didaftarkan' => $faker->dateTimeBetween('-2 month', '-1 days')->format('d-m-Y'),
				'nilai_kekayaan' => $faker->numberBetween(1000, 9000000),
				'lokasi_penempatan' => $faker->firstName,
				'batas_pakai' => $faker->dateTimeBetween('-2 month', '-1 days')->format('d-m-Y'),
				'keterangan' => $faker->firstName,
			];

			$this->db->table('inventaris')->insert($data);
			echo 'Create inventaris with id ' . $data['no_inventaris'] . "\n";
		}
	}
}
