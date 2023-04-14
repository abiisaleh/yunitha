<?php

namespace App\Controllers\admin\datamaster;

use App\Controllers\BaseController;
use App\Models\GolDarahModel;

class GolDarah extends BaseController
{
    protected $goldarahModel;

    public function __construct()
    {
        $this->goldarahModel = new GolDarahModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Gologan Darah',
        ];

        return view('pages/petugas/datamaster',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->goldarahModel->findAll(),
                'tabel' => ['nama'],
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
            $this->goldarahModel->save($data);

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
            $this->goldarahModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
