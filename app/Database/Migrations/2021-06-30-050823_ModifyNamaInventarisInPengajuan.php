<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyNamaInventarisInPengajuan extends Migration
{
	public function up()
	{
		$fields = [
			'nama_inventaris' => [
				'type' => 'VARCHAR',
				'constraint' => 512,
			]
		];
		$this->forge->modifyColumn('pengajuan', $fields);
	}

	public function down()
	{
		$fields = [
			'nama_inventaris' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			]
		];
		$this->forge->modifyColumn('pengajuan', $fields);
	}
}
