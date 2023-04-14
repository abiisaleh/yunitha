<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\JadwalKegiatanModel;

class JadwalKegiatan extends BaseController
{
    protected $JadwalKegiatanModel;

    public function __construct()
    {
        $this->JadwalKegiatanModel = new JadwalKegiatanModel();
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Jadwal Kegiatan',
        ];

        return view('pages/petugas/jadwalkegiatan',$data);
    }

    public function show()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->JadwalKegiatanModel->findAll(),
                'tabel' => ['tmpt_keg','tgl_keg','lokasi'],
                'pk' => 'id_jat_kegiatan',
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
            $this->JadwalKegiatanModel->save($data);

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
            $this->JadwalKegiatanModel->delete($id);

            $result = [
                'output' => "Data berhasil dihapus dari database",
            ];

            echo json_encode($result);
        } else {
            exit('404 Not Found');
        }
    }
}
