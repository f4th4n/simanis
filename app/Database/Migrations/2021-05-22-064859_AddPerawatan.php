<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPerawatan extends Migration
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
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'inventaris_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'nomor_perawatan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unique' => true,
				'unsigned' => true,
			],
			'tanggal_perawatan' => [
				'type' => 'TIMESTAMP', 'null' => true,
			],
			'tanggal_selesai' => [
				'type' => 'TIMESTAMP', 'null' => true,
			],
			'tempat_perawatan' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'biaya_perawatan' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'foto_kwitansi' => [
				'type' => 'VARCHAR',
				'constraint' => 512,
			],
			'keterangan' => [
				'type' => 'TEXT',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('inventaris_id', 'inventaris', 'id');
		$this->forge->createTable('perawatan');
	}

	public function down()
	{
		$this->forge->dropTable('perawatan');
	}
}
