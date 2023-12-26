<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterPdk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_model' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'no_order' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'buyer' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'po_global' => [
                'type' => 'DOUBLE',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'admin' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('no_model', true); // Primary Key
        $this->forge->createTable('master_pdk');
    }

    public function down()
    {
        $this->forge->dropTable('master_pdk');
    }
}
