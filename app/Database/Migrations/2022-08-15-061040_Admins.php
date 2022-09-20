<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
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
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255' ,
				'null'           => true,
			],

			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],

			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		// primary key
		$this->forge->addKey('id', TRUE);

		// tabel users
		$this->forge->createTable('admins', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
