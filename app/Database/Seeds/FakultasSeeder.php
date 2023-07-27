<?php

namespace App\Database\Seeds;

use App\Models\FakultasModel;
use CodeIgniter\Database\Seeder;

class FakultasSeeder extends Seeder
{
    public function run()
    {
        $model = new FakultasModel();
        $newKode = $model->generateKodeFakultas();
        $data = [
            'kd_fakultas' => $newKode,
            'nama_fakultas' => 'Fakultas Industri Halal',
            'id_ruangan' => 6
        ];

        $this->db->table('fakultas')->insert($data);
    }
}
