<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatDonor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_riwayat_donor' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_terakhir_donor' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'waktu_donor_kembali' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tempat_donor' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jumlah_kolf' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'donor_ke' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'fk_pendonor' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addKey('id_riwayat_donor', true);
        $this->forge->createTable('riwayat_donor');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_donor');
    }
}
