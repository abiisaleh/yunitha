<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenggunaanDarah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penggunaan_darah' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATETIME'
            ],
            'fk_peserta' => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'fk_rumah_sakit' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'fk_jenis_darah' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'fk_gol_darah' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'jumlah_kolf' => [
                'type' => 'INT',
                'constarint' => 5
            ]
        ]);

        $this->forge->addKey('id_penggunaan_darah',true);
        $this->forge->createTable('penggunaan_darah');
    }

    public function down()
    {
        $this->forge->dropTable('penggunaan_darah');
    }
}
