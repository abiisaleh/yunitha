<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RumahSakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rumah_sakit' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addKey('id_rumah_sakit',true);
        $this->forge->createTable('rumah_sakit');
    }

    public function down()
    {
        $this->forge->dropTable('rumah_sakit');
    }
}
