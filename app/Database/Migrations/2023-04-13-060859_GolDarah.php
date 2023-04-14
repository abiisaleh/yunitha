<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GolDarah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gol_darah' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 2
            ],
        ]);

        $this->forge->addKey('id_gol_darah',true);
        $this->forge->createTable('gol_darah');
    }

    public function down()
    {
        $this->forge->dropTable('gol_darah');
    }
}
