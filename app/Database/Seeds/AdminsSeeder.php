<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'novitex',
            'password'    => password_hash('9hO*NyreA550',PASSWORD_DEFAULT),
        ];

        // Simple Queries
        $this->db->query('INSERT INTO admins (username, password) VALUES(:username:, :password:)', $data);

        // Using Query Builder
        $this->db->table('admins')->insert($data);
    }
}
