<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendonor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pendonor' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'fk_gol_darah' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'fk_jenis_kelamin' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'fk_pekerjaan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addKey('id_pendonor',true);
        $this->forge->createTable('pendonor');
    }

    public function down()
    {
        $this->forge->dropTable('pendonor');
    }
}
