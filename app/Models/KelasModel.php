<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields  = ['kd_kelas', 'nama_kelas'];

    function countKelasData()
    {
        return $this->countAllResults();
    }

    function generateKodeKelas()
    {
        $lastKode = $this->orderBy('id_kelas', 'DESC')->first();

        if ($lastKode) {
            $getKode = $lastKode['kd_kelas'];
            $lastNumKode = intval(substr($getKode, -003));
            $newNumKode = $lastNumKode + 1;
            $newKode = 'R017' . str_pad($newNumKode, 3, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'R017001';
        }

        return $newKode;
    }
}
