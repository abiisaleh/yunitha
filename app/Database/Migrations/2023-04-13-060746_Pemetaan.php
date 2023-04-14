<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemetaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemetaan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'waktu_donor_kembali' => [
                'type' => 'DATETIME'
            ],
            'fk_id_pendonor' => [
                'type' => 'INT',
                'constraint' => 5
            ],
        ]);

        $this->forge->addKey('id_pemetaan',true);
        $this->forge->createTable('pemetaan');
    }

    public function down()
    {
        $this->forge->dropTable('pemetaan');
    }
}
