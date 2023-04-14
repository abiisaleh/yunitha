<?php

namespace App\Controllers\admin\datamaster;

use App\Controllers\BaseController;
use App\Models\RumahSakitModel;

class RumahSakit extends BaseController
{
    protected $RumahSakitModel;

    public function __construct()
    {
        $this->RumahSakitModel = new RumahSakitModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Rumah Sakit',
        ];

        return view('pages/petugas/datamaster',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->RumahSakitModel->findAll(),
                'tabel' => ['nama'],
                'pk' => 'id_rumah_sakit',
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
            $this->RumahSakitModel->save($data);

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
            $this->RumahSakitModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
