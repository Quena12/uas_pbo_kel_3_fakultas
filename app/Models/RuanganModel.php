<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $allowedFields  = ['kd_ruangan', 'nama_ruangan'];

    function countRuanganData()
    {
        return $this->countAllResults();
    }

    function generateKodeRuangan()
    {
        $lastKode = $this->orderBy('id_ruangan', 'DESC')->first();

        if ($lastKode) {
            $getKode = $lastKode['kd_ruangan'];
            $lastNumKode = intval(substr($getKode, -003));
            $newNumKode = $lastNumKode + 1;
            $newKode = 'R017' . str_pad($newNumKode, 3, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'R017001';
        }

        return $newKode;
    }

    protected $belongsTo = [
        'fakultas' => 'App\Models\FakultasModel'
    ];
}
