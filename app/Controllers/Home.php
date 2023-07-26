<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProdiModel;
use App\Models\RuanganModel;

class Home extends BaseController
{



    public function index()
    {
        $fakultasModel = new FakultasModel();
        $ruanganModel = new RuanganModel();
        $prodiModel = new ProdiModel();

        $data['fakultas'] = $fakultasModel->getData();
        $data['totalFakultas'] = $fakultasModel->countFakultasData();
        $data['ruangan'] = $ruanganModel->findAll();
        $data['totalRuangan'] = $ruanganModel->countRuanganData();
        $data['prodi'] = $prodiModel->findAll();
        $data['totalProdi'] = $prodiModel->countProdiData();





        $data['tittle'] = 'Dashboard';
        return view('content', $data);
    }
}
