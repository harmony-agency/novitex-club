<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersDetails extends Migration
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
			'score_utm'       => [
				'type'           => 'VARCHAR',
                'constraint'     => 5,
				'null'           => true,

			],
			'score_referral_code'       => [
				'type'           => 'VARCHAR',
                'constraint'     => 5,
				'null'           => true,

			],
			'utm_source'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null'           => true,
			],
            'utm_medium'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null'           => true,
			],
            'utm_campaign'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null'           => true,
			],
            'referrer'      => [
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
		$this->forge->createTable('users_details', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users_details');
    }
}
