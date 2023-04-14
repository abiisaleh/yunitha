<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokDarah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stok_darah' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jumlah_kolf' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'fk_gol_darah' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'fk_jenis_darah' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addKey('id_stok_darah',true);
        $this->forge->createTable('stok_darah');
    }

    public function down()
    {
        $this->forge->dropTable('stok_darah');
    }
}
