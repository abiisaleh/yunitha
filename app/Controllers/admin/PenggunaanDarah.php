<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PenggunaanDarahModel;

class PenggunaanDarah extends BaseController
{
    protected $PengunaanDarahModel;

    public function __construct()
    {
        $this->PengunaanDarahModel = new PenggunaanDarahModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Penggunaan Darah',
        ];

        return view('pages/petugas/penggunaandarah',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->PengunaanDarahModel->findAll(),
                'tabel' => ['tanggal','peserta','fk_rumah_sakit','fk_jenis_darah','fk_gol_darah','jumlah_kolf'],
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
            $this->PengunaanDarahModel->save($data);

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
            $this->PengunaanDarahModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
