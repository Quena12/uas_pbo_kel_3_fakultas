<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kd_fakultas', 'nama_fakultas'];

    function countFakultasData()
    {
        return $this->countAllResults();
    }

    function generateKodeFakultas()
    {
        $lastKode = $this->orderBy('id', 'DESC')->first();

        if ($lastKode) {
            $getKode = $lastKode['kd_fakultas'];
            $lastNumKode = intval(substr($getKode, -003));
            $newNumKode = $lastNumKode + 1;
            $newKodeFakultas = 'F017' . str_pad($newNumKode, 3, '0', STR_PAD_LEFT);
        } else {
            $newKodeFakultas = 'F017001';
        }

        return $newKodeFakultas;
    }
}
