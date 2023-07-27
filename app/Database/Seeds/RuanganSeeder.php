<?php

namespace App\Database\Seeds;

use App\Models\RuanganModel;
use CodeIgniter\Database\Seeder;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        $model = new RuanganModel();
        $newKode = $model->generateKodeRuangan();
        $data = [
            [
                'kd_ruangan' => $newKode,
                'nama_ruangan' => 'Anggrek',
            ],
            [
                'kd_ruangan' => $newKode,
                'nama_ruangan' => 'Mawar',
            ],
            [
                'kd_ruangan' => $newKode,
                'nama_ruangan' => 'Kelinci',
            ],
            [
                'kd_ruangan' => $newKode,
                'nama_ruangan' => 'Gaharu',
            ]
        ];

        $this->db->table('ruangan')->insertBatch($data);
    }
}
