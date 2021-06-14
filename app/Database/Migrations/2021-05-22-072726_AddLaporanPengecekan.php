<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLaporanPengecekan extends Migration
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
			'no_pengajuan' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'tanggal_pengecekan' => [
				'type' => 'TIMESTAMP', 'null' => true,
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('laporan_pengecekan');
	}

	public function down()
	{
		$this->forge->dropTable('laporan_pengecekan');
	}
}
