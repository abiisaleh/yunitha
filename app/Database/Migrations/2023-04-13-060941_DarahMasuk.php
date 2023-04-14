<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DarahMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_darah_masuk' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_masuk' => [
                'type' => 'DATETIME'
            ],
            'no_selang' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'tempat_donor' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jumlah_kolf' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'donor_ke' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'fk_pendonor' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'fk_gol_darah' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'fk_jenis_darah' => [
                'type' => 'INT',
                'constraint' => 5
            ],
        ]);

        $this->forge->addKey('id_darah_masuk',true);
        $this->forge->createTable('darah_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('darah_masuk');
    }
}
