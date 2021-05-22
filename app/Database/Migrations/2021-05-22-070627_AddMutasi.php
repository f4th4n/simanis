<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMutasi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'inventaris_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'no_mutasi' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'tanggal_mutasi' => [
				'type' => 'TIMESTAMP',
			],
			'lokasi_awal' => [
				'type' => 'VARCHAR',
				'constraint' => 512,
			],
			'lokasi_tujuan' => [
				'type' => 'VARCHAR',
				'constraint' => 512,
			],
			'keterangan' => [
				'type' => 'TEXT',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('inventaris_id', 'inventaris', 'id');
		$this->forge->createTable('mutasi');
	}

	public function down()
	{
		$this->forge->dropTable('mutasi');
	}
}
