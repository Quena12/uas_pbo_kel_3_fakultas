<?php

namespace App\Controllers;

use App\Models\FakultasModel;

class Fakultas extends BaseController
{

    protected $model;
    function __construct()
    {
        $this->model = new FakultasModel();
    }


    public function index()
    {
        $fakultas['title'] = 'Fakultas';
        $fakultas['fakultas'] = $this->model->findAll();
        return view('fakultas/index', $fakultas);
    }

    // public function getJson()
    // {
    //     $fakultasModel = new FakultasModel();
    //     $fakultas = $fakultasModel->findAll();

    //     return $this->response->setJSON($fakultas);
    // }

    public function create()
    {

        $newKodeFakultas = $this->model->generateKodeFakultas();

        $this->model->insert([
            'nama' => $this->request->getPost('nama'),
            'kd_fakultas' => $newKodeFakultas
        ]);

        return redirect()->to('/fakultas');
    }



    public function edit($id)
    {
        $data['title'] = "Edit Fakultas";
        $data['fakultas'] = $this->model->find($id);

        return view('fakultas/edit', $data);
    }

    public function update($id)
    {
        $fakultasModel = new FakultasModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
        ];

        $fakultasModel->update($id, $data);

        return redirect()->to('/fakultas');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('/fakultas');
    }
}
