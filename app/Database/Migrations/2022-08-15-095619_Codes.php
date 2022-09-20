<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Codes extends Migration
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
			'code'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255' ,
                'unique'   => true,
			],
			'score'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'active'      => [
				'type'           => 'BOOLEAN',
				'default'     => true,
			],
			'expired' => [
				'type' => 'DATETIME',
                'null' => true,
			],

			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		// primary key
		$this->forge->addKey('id', TRUE);

		// tabel users
		$this->forge->createTable('codes', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('codes');

    }
}
