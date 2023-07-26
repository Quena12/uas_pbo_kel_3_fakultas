<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FakultasMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fakultas' => [
                'type' => 'BIGINT',
                // 'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kd_fakultas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_fakultas' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_ruangan' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id_fakultas', true);
        $this->forge->addForeignKey('id_ruangan', 'ruangan', 'id_ruangan');
        $this->forge->createTable('fakultas', true);
    }

    public function down()
    {
        $this->forge->dropForeignKey('fakultas', 'fakultas_id_ruangan_foreign');
        $this->forge->dropTable('fakultas');
    }
}
