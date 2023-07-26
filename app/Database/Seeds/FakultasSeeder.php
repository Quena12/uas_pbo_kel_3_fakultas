<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakultasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_fakultas' => 'Fakultas Industri Halal'],
            ['id_ruangan' => 1],
        ];

        $this->db->table('fakultas')->insertBatch($data);
    }
}
