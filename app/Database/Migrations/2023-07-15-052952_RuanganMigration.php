<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RuanganMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_ruangan' => [
                    'type' => 'BIGINT',
                    'constraint' => 20,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'kd_ruangan' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'nama_ruangan' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ]
            ]
        );
        $this->forge->addKey('id_ruangan', true);
        $this->forge->createTable('ruangan');
    }

    public function down()
    {
        $this->forge->dropTable('ruangan');
    }
}
