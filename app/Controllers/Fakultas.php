<?php

namespace App\Controllers;

use App\Models\FakultasModel;

class Fakultas extends BaseController
{
    public function index()
    {
        $fakultasModel = new FakultasModel();
        $fakultas['fakultas'] = $fakultasModel->findAll();

        // return json_encode (
        //     array(
        //         "fakultas" =>$fakultas['fakultas']
        //     )
        //     );

        return view('index', $fakultas);
    }

    // public function getJson()
    // {
    //     $fakultasModel = new FakultasModel();
    //     $fakultas = $fakultasModel->findAll();

    //     return $this->response->setJSON($fakultas);
    // }

    public function create()
    {
        return view('fakultas/create');
    }

    public function store()
    {
        $fakultasModel = new FakultasModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
        ];

        $fakultasModel->insert($data);

        return redirect()->to('/fakultas');
    }

    public function edit($id)
    {
        $fakultasModel = new FakultasModel();
        $fakultas = $fakultasModel->find($id);

        return view('fakultas/edit', ['fakultas' => $fakultas]);
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
        $fakultasModel = new FakultasModel();
        $fakultasModel->delete($id);

        return redirect()->to('/fakultas');
    }
}

