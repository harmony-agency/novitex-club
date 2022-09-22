<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Images extends Migration
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
            'user_id'       => [
				'type'           => 'INT',
                'constraint'     => 5,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255' ,
                'unique'   => true,
			],
			'type'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status'      => [
				'type'           => 'BOOLEAN',
				'default'     => false,
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		// primary key
		$this->forge->addKey('id', TRUE);

		// tabel users
		$this->forge->createTable('images', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('images');

    }
}
