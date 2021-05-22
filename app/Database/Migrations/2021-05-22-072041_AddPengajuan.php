<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPengajuan extends Migration
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
			'no_pengajuan' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'tanggal_pengajuan' => [
				'type' => 'TIMESTAMP',
			],
			'nama_inventaris' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'total' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'keterangan' => [
				'type' => 'TEXT',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('pengajuan');
	}

	public function down()
	{
		$this->forge->dropTable('pengajuan');
	}
}
