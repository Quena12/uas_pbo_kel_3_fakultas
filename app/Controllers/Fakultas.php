<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProdiModel;
use App\Models\RuanganModel;

class Fakultas extends BaseController
{

    protected $fakultasModel;
    protected $ruanganModel;
    protected $prodiModel;

    public function __construct() {
        $this->fakultasModel = new FakultasModel();
        $this->ruanganModel = new RuanganModel();
        $this->prodiModel = new ProdiModel();
    }
        


    public function index()
    {

        //get Ruangan Data
        $fakultas['ruangan'] = $this->ruanganModel->findAll();
        $fakultas['prodi'] = $this->prodiModel->findAll();

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

    public function createNewFakultas()
    {
        $newKodeFakultas = $this->fakultasModel->generateKodeFakultas();
        $data = [
            'kd_fakultas' => $newKodeFakultas,
            'nama_fakultas' => $this->request->getPost('nama_fakultas'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'id_prodi' => $this->request->getPost('id_prodi')
        ];
        $this->fakultasModel->insert($data);
        return redirect()->to('/fakultas');
    }


    public function edit($id_fakultas)
    {
        //getData Ruangan
        $data['ruangan'] = $this->ruanganModel->findAll();
        $data['prodi'] = $this->prodiModel->findAll();

        //edit func
        $data['title'] = "Edit Fakultas";
        $data['fakultas'] = $this->fakultasModel->find($id_fakultas);

        return view('fakultas/edit', $data);
    }

    public function update($id_fakultas)
    {
        $data = [
            'nama_fakultas' => $this->request->getPost('nama_fakultas'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
        ];

        $this->fakultasModel->update($id_fakultas, $data);

        return redirect()->to('/fakultas');
    }

    public function delete($id_fakultas)
    {
        $this->fakultasModel->delete($id_fakultas);

        return redirect()->to('/fakultas');
    }
}
