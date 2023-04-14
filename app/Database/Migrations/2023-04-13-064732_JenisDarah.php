<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisDarah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_darah' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
        ]);

        $this->forge->addKey('id_jenis_darah',true);
        $this->forge->createTable('jenis_darah');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_darah');
    }
}
