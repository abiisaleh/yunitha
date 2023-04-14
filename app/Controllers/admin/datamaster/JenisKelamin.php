<?php

namespace App\Controllers\admin\datamaster;

use App\Controllers\BaseController;
use App\Models\JenisKelaminModel;

class JenisKelamin extends BaseController
{
    protected $JenisKelaminModel;

    public function __construct()
    {
        $this->JenisKelaminModel = new JenisKelaminModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Jenis Kelamin',
        ];

        return view('pages/petugas/datamaster',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->JenisKelaminModel->findAll(),
                'tabel' => ['nama'],
                'pk' => 'id_jenis_kelamin',
            ];

            $result = [
                'tabel' => view('component/tabel', $data),
                'modal' => view('component/modal', $data)
            ];
            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }

    public function save()
    {
        if ($this->request->isAjax()) {
            $data = $this->request->getVar();
            $this->JenisKelaminModel->save($data);

            $result = [
                'success' => 'Data berhasil disimpan ke database'
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }

    public function delete()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->getVar('id');
            $this->JenisKelaminModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
