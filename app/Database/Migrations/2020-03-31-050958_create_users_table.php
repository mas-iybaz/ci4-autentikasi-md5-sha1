<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'fullname' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nim' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password_sha1' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password_md5' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'address' => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
			],
			'phone' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
