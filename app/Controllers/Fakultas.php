<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $allowedFields = ['kd_fakultas', 'nama_fakultas', 'id_ruangan', 'id_prodi'];

    function countFakultasData()
    {
        return $this->countAllResults();
    }

    function generateKodeFakultas()
    {
        $lastKode = $this->orderBy('id_fakultas', 'DESC')->first();

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


    function getData()
    {
        $builder = $this->db->table('fakultas')
            ->join('ruangan', 'ruangan.id_ruangan = fakultas.id_ruangan')
            ->join('prodi', 'prodi.id_prodi = fakultas.id_prodi')
            ->get()->getResult();
        return $builder;
    }
}
