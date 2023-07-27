<?php

namespace App\Database\Seeds;

use App\Models\ProdiModel;
use CodeIgniter\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        $model = new ProdiModel();
        $newKode = $model->generateKodeProdi();
        $data = [
            [
                'kd_prodi' => $newKode,
                'nama_prodi' => 'Informatika',
            ],
            [
                'kd_prodi' => $newKode,
                'nama_prodi' => 'Teknik Elektro',
            ],
            [
                'kd_prodi' => $newKode,
                'nama_prodi' => 'Farmasi',
            ],
            [
                'kd_prodi' => $newKode,
                'nama_prodi' => 'Agribisnis',
            ]
        ];

        $this->db->table('prodi')->insertBatch($data);
    }
}
