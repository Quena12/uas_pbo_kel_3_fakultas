<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\RuanganModel;

class Home extends BaseController
{



    public function index()
    {
        $fakultasModel = new FakultasModel();
        $ruanganModel = new RuanganModel();

        $data['fakultas'] = $fakultasModel->findAll();
        $data['totalFakultas'] = $fakultasModel->countFakultasData();
        $data['ruangan'] = $ruanganModel->findAll();
        $data['totalRuangan'] = $ruanganModel->countRuanganData();


        $data['tittle'] = 'Dashboard';
        return view('content', $data);
    }
}
