<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class KelasController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new KelasModel();
    }


    public function index()
    {
        $data['title'] = 'Kelas';
        $data['dataKelas'] = $this->model->orderBy('id_kelas', 'asc')->findAll();
        return view('kelas/index', $data);
    }

    function addKelas()
    {

        $newKode = $this->model->generateKodeKelas();

        $namaKelas = $this->request->getPost('nama_kelas');

        $this->model->insert([
            'kd_kelas' => $newKode,
            'nama_kelas' => $namaKelas
        ]);

        return redirect()->to('/kelas');
    }

    public function editKelas($id_kelas)
    {
        // Mengambil data ruangan yang akan diedit dari database
        $data['title'] = "Edit Kelas";
        $data['kelas'] = $this->model->find($id_kelas);

        // Validasi data yang dikirimkan dari form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kd_kelas' => 'required',
            'nama_kelas' => 'required'
        ]);

        // Jalankan validasi
        if ($this->request->getMethod() === 'post') {
            // Jalankan validasi
            $isValid = $validation->withRequest($this->request)->run();
            if ($isValid) {
                // Jika data valid, lakukan pembaruan ke database
                $this->model->update($id_kelas, [
                    'kd_kelas' => $this->request->getPost('kd_kelas'),
                    'nama_kelas' => $this->request->getPost('nama_kelas')
                ]);

                // Redirect ke halaman daftar ruangan
                return redirect()->to('/kelas');
            } else {
                // Tampilkan halaman edit ruangan dengan data yang ada dan pesan validasi
                $data['validation'] = $validation;
                echo view('edit_kelas', $data);
                return;
            }
        }


        // Tampilkan halaman edit ruangan dengan data yang ada
        echo view('kelas/edit', $data);
    }

    function deleteKelas($id_kelas)
    {

        $this->model->delete($id_kelas);

        return redirect()->to('/kelas')->with('sukses', 'delete');
    }
}
