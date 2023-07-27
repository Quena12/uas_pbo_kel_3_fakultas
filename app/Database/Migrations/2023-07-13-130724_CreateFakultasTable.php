<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class CreateFakultasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
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
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('fakultas', true);
    }

    public function down()
    {
        $this->forge->dropTable('fakultas');
    }
}
