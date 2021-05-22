<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSuratPerintah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'no_surat' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'tanggal_terbit' => [
				'type' => 'TIMESTAMP',
			],
			'to_user' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'perintah' => [
				'type' => 'TEXT',
			],
			'tanggal_pelaksanaan' => [
				'type' => 'TIMESTAMP',
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('to_user', 'users', 'id');
		$this->forge->createTable('surat_perintah');
	}

	public function down()
	{
		$this->forge->dropTable('kondisi_inventaris');
	}
}
