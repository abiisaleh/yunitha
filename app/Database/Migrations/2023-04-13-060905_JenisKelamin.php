<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKelamin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_kelamin' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
        ]);

        $this->forge->addKey('id_jenis_kelamin',true);
        $this->forge->createTable('jenis_kelamin');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_kelamin');
    }
}
