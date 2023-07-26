<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\RuanganModel;

class Fakultas extends BaseController
{
    protected $fakultasModel;

    function __construct()
    {
        $this->fakultasModel = new FakultasModel();
    }


    public function index()
    {

        //get Ruangan Data
        $ruanganModel = new RuanganModel();
        $fakultas['ruangan'] = $ruanganModel->findAll();

        //get All Data
        $fakultas['title'] = 'Fakultas';
        $fakultas['fakultas'] = $this->fakultasModel->getData();
        $fakultas['json'] = json_encode(
            array(
                'fakultas' => $fakultas['fakultas']
            )
        );
        return view('fakultas/index', $fakultas);
    }

    function createNewFakultas()
    {

        $fakultas['fakultas'] = $this->fakultasModel->getData();
        $newKodeFakultas = $this->fakultasModel->generateKodeFakultas();
        $data = [
            'nama_fakultas' => $this->request->getPost('nama_fakultas'),
            'kd_fakultas' => $newKodeFakultas,
            'id_ruangan' => $this->request->getPost('id_ruangan')
        ];
        $this->fakultasModel->insert($data);
        return redirect()->to('/fakultas');
    }

    // public function getJson()
    // {
    //     $fakultasModel = new FakultasModel();
    //     $fakultas = $fakultasModel->findAll();

    //     return $this->response->setJSON($fakultas);
    // }

    public function create()
    {
        $newKodeFakultas = $this->fakultasModel->generateKodeFakultas();

        $this->fakultasModel->insert([
            'nama' => $this->request->getPost('nama'),
            'kd_fakultas' => $newKodeFakultas
        ]);

        return redirect()->to('/fakultas');
    }



    public function edit($id)
    {
        $data['title'] = "Edit Fakultas";
        $data['fakultas'] = $this->fakultasModel->find($id);

        return view('fakultas/edit', $data);
    }

    public function update($id)
    {

        $data = [
            'nama' => $this->request->getPost('nama'),
        ];

        $this->fakultasModel->update($id, $data);

        return redirect()->to('/fakultas');
    }

    public function delete($id)
    {
        $this->fakultasModel->delete($id);

        return redirect()->to('/fakultas');
    }
}
