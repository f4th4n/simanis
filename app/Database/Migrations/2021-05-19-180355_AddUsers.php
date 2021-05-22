<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
				'unique' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'keterangan' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'role_id' => [
				'type' => 'ENUM',
				'constraint' => ['admin', 'pengecek', 'pemimpin'],
				'default' => 'admin'
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('users');
	}

	public function down() {
		$this->forge->dropTable('users');
	}
}
