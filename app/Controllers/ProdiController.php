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

    public function editProdi($id_prodi)
    {
        // Mengambil data ruangan yang akan diedit dari database
        $data['title'] = "Edit Prodi";
        $data['prodi'] = $this->model->find($id_prodi);

        // Validasi data yang dikirimkan dari form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kd_prodi' => 'required',
            'nama_prodi' => 'required'
        ]);

        // Jalankan validasi
        if ($this->request->getMethod() === 'post') {
            // Jalankan validasi
            $isValid = $validation->withRequest($this->request)->run();
            if ($isValid) {
                // Jika data valid, lakukan pembaruan ke database
                $this->model->update($id_prodi, [
                    'kd_prodi' => $this->request->getPost('kd_prodi'),
                    'nama_prodi' => $this->request->getPost('nama_prodi')
                ]);

                // Redirect ke halaman daftar ruangan
                return redirect()->to('/prodi');
            } else {
                // Tampilkan halaman edit ruangan dengan data yang ada dan pesan validasi
                $data['validation'] = $validation;
                echo view('prodi/edit', $data);
                return;
            }
        }


        // Tampilkan halaman edit ruangan dengan data yang ada
        echo view('prodi/edit', $data);
    }

    function delete($id_prodi)
    {
        $this->model->delete($id_prodi);

        return redirect()->to('/prodi');
    }
}
