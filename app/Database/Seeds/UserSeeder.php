<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seeder for packing users
        for ($i = 1; $i <= 11; $i++) {
            $username = 'userpacking' . $i;

            $data = [
                'username' => $username,
                'password' => 'packing', // Change 'password' to the desired password
                'role' => 'packing',
            ];

            $this->db->table('users')->insert($data);
        }

        // Seeder for monitoring user
        $dataMonitoring = [
            'username' => 'usermonitoring',
            'password' => password_hash('monitoring', PASSWORD_DEFAULT), // Change 'password' to the desired password
            'role' => 'monitoring',
        ];

        $this->db->table('users')->insert($dataMonitoring);
    }
}
