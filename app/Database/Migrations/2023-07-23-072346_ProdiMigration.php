<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdiMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_prodi' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'kd_prodi' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'nama_prodi' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ]
            ]
        );
        $this->forge->addKey('id_prodi', true);
        $this->forge->createTable('prodi');
    }

    public function down()
    {
        $this->forge->dropTable('prodi');
    }
}
