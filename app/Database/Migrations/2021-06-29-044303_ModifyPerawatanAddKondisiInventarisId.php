<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPerawatanAddKondisiInventarisId extends Migration
{
	public function up()
	{
		$fields = [
			'kondisi_inventaris_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			]
		];
		$this->forge->addColumn('perawatan', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('perawatan', 'kondisi_inventaris_id');
	}
}
