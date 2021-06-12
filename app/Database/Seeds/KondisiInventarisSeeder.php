<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PerawatanModel;
use App\Models\UserModel;
use App\Models\InventarisModel;
use App\Models\LaporanPengecekanModel;
use CodeIgniter\Test\Fabricator;
use Faker\Factory;

class KondisiInventarisSeeder extends Seeder {
	public function run() {
		$laporan_pengecekan_model = new LaporanPengecekanModel();
		$user_model = new UserModel();
		$inventaris_model = new InventarisModel();
		$faker = Factory::create('id_ID');

		for($i = 0; $i < 3; $i++) {
			$data = [
				'inventaris_id' => $inventaris_model->first()['id'],
				'kondisi' => 'baik',
				'informasi' => 'Kosong',
				'laporan_pengecekan_id' => $laporan_pengecekan_model->first()['id'],
				'user_id' => $user_model->first()['id'],
			];

			$this->db->table('kondisi_inventaris')->insert($data);
			echo 'Create kondisi inventaris' . "\n";
		}
	}
}
