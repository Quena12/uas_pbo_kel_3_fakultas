<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields  = ['kd_prodi', 'nama_prodi'];

    function countProdiData()
    {
        return $this->countAllResults();
    }

    function generateKodeProdi()
    {
        $lastKode = $this->orderBy('id_prodi', 'DESC')->first();

        if ($lastKode) {
            $getKode = $lastKode['kd_prodi'];
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
