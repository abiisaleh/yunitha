<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PendonorModel;

class Pendonor extends BaseController
{
    protected $PendonorModel;

    public function __construct()
    {
        $this->PendonorModel = new PendonorModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Pendonor',
        ];

        return view('pages/petugas/pendonor',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->PendonorModel->findAll(),
                'tabel' => ['nama','fk_gol_darah','fk_jenis_kelamin','alamat','pekerjaan'],
                'pk' => 'id_gol_darah',
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
            $this->PendonorModel->save($data);

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
            $this->PendonorModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
