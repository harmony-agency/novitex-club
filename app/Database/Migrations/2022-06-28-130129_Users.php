<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
    	$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255' ,
				'null'           => true,
			],
			'mobile'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'instagram' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'unique'   => true,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'score' => [
				'type' => 'INT',
				'constraint' => '5',
			],
			'referral_code'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'           => true,
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		// primary key
		$this->forge->addKey('id', TRUE);

		// tabel users
		$this->forge->createTable('users', TRUE);

    }

    public function down()
    {
        $this->forge->dropTable('users');

    }
}
