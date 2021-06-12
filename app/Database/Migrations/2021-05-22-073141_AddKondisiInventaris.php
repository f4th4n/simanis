<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKondisiInventaris extends Migration
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
			'inventaris_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'kondisi' => [
				'type' => 'ENUM',
				'constraint' => ['baik', 'kurang_baik', 'rusak'],
				'default' => 'baik'
			],
			'informasi' => [
				'type' => 'TEXT',
			],
			'laporan_pengecekan_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('inventaris_id', 'inventaris', 'id');
		$this->forge->createTable('kondisi_inventaris');
	}

	public function down()
	{
		$this->forge->dropTable('kondisi_inventaris');
	}
}
