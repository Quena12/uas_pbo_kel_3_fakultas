<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_kelas' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'kd_kelas' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'nama_kelas' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ]
            ]
        );
        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('kelas');
    }
    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
