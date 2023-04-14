<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\StokDarahModel;

class StokDarah extends BaseController
{
    protected $StokDarahModel;

    public function __construct()
    {
        $this->StokDarahModel = new StokDarahModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Stok Darah',
        ];

        return view('pages/petugas/stokDarah',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->StokDarahModel->findAll(),
                'tabel' => ['jumlah_kolf','fk_gol_darah','fk_jenis_darah'],
                'pk' => 'id_stok_darah',
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
            $this->StokDarahModel->save($data);

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
            $this->StokDarahModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
