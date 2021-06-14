<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInventaris extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'no_inventaris' => [
				'type' => 'INT',
				'constraint' => 11,
				'unique' => true,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'no_seri' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'merk' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'warna' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'tanggal_didaftarkan' => [
				'type' => 'TIMESTAMP', 'null' => true,
			],
			'nilai_kekayaan' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'lokasi_penempatan' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'batas_pakai' => [
				'type' => 'TIMESTAMP', 'null' => true,
			],
			'keterangan' => [
				'type' => 'TEXT',
			],
			'pesan' => [
				'type' => 'TEXT',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('inventaris');
	}

	public function down() {
		$this->forge->dropTable('inventaris');
	}
}
