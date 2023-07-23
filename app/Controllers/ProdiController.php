<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;

class ProdiController extends BaseController
{
    protected $model;

    function __construct()
    {
        $this->model = new ProdiModel();
    }
    public function index()
    {
        $data['title'] = 'Program Studi';
        $data['dataProdi'] = $this->model->orderBy('id_prodi', 'asc')->findAll();
        return view('prodi/index', $data);
    }

    function create()
    {
        $newKodeProdi = $this->model->generateKodeProdi();

        $namaProdi = $this->request->getPost('nama_prodi');

        $this->model->insert([
            'kd_prodi' => $newKodeProdi,
            'nama_prodi' => $namaProdi
        ]);

        return redirect()->to('/prodi');
    }

    function delete($id_prodi)
    {
        $this->model->delete($id_prodi);

        return redirect()->to('/prodi');
    }
}
