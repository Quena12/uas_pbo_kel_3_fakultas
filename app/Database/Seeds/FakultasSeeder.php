<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakultasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Fakultas Industri Halal'],
            ['nama' => 'Fakultas Teknologi Informasi'],
            ['nama' => 'Fakultas Dirasah Islamiyah'],
            ['nama' => 'Fakultas Ekonomi'],
            ['nama' => 'Fakultas Pendidikan'],
        ];

        $this->db->table('fakultas')->insertBatch($data);
    }
}
