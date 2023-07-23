<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RuanganModel;
use CodeIgniter\Validation\Validation as ValidationValidation;
use Config\Validation;

class RuanganController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new RuanganModel();
    }


    public function index()
    {
        $data['title'] = 'Ruangan';
        $data['dataRuangan'] = $this->model->orderBy('id_ruangan', 'asc')->findAll();
        return view('ruangan/ruangan_view', $data);
    }

    function addRuangan()
    {

        $newKode = $this->model->generateKodeRuangan();

        $namaRuangan = $this->request->getPost('nama_ruangan');

        $this->model->insert([
            'kd_ruangan' => $newKode,
            'nama_ruangan' => $namaRuangan
        ]);

        return redirect()->to('/ruangan');
    }

    public function editRuangan($id_ruangan)
    {
        // Mengambil data ruangan yang akan diedit dari database
        $data['title'] = "Edit Ruangan";
        $data['ruangan'] = $this->model->find($id_ruangan);

        // Validasi data yang dikirimkan dari form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kd_ruangan' => 'required',
            'nama_ruangan' => 'required'
        ]);

        // Jalankan validasi
        if ($this->request->getMethod() === 'post') {
            // Jalankan validasi
            $isValid = $validation->withRequest($this->request)->run();
            if ($isValid) {
                // Jika data valid, lakukan pembaruan ke database
                $this->model->update($id_ruangan, [
                    'kd_ruangan' => $this->request->getPost('kd_ruangan'),
                    'nama_ruangan' => $this->request->getPost('nama_ruangan')
                ]);

                // Redirect ke halaman daftar ruangan
                return redirect()->to('/ruangan');
            } else {
                // Tampilkan halaman edit ruangan dengan data yang ada dan pesan validasi
                $data['validation'] = $validation;
                echo view('edit_ruangan', $data);
                return;
            }
        }


        // Tampilkan halaman edit ruangan dengan data yang ada
        echo view('ruangan/edit', $data);
    }

    function deleteRuangan($id_ruangan)
    {

        $this->model->delete($id_ruangan);

        return redirect()->to('/ruangan')->with('sukses', 'delete');
    }
}
