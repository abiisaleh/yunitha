<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\DarahMasukModel;

class DarahMasuk extends BaseController
{
    protected $DarahMasukModel;

    public function __construct()
    {
        $this->DarahMasukModel = new DarahMasukModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Darah Masuk',
        ];

        return view('pages/petugas/darahmasuk',$data);
    }

    public function show()
    {
        helper('form');
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->DarahMasukModel->findAll(),
                'tabel' => ['tgl_masuk','no_selang','fk_pendonor','tempat_donor','jumlah_kolf','fk_gol_darah','fk_jenis_darah','donor_ke'],
                'pk' => 'id_darah_masuk',
            ];

            $result = [
                'tabel' => view('component/tabel', $data),
                'modal' => view('component/modal',$data),
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
            $this->DarahMasukModel->save($data);

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
            $this->DarahMasukModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
