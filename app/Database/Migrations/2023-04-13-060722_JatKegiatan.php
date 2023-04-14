<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JatKegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jat_kegiatan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tmpt_keg' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'tgl_keg' => [
                'type' => 'DATETIME'
            ], 
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);

        $this->forge->addKey('id_jat_kegiatan',true);
        $this->forge->createTable('jat_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('jat_kegiatan');
    }
}
