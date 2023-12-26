<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterInisial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_inisial' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_model' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'style' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'area' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'inisial' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'po_inisial' => [
                'type' => 'DOUBLE',
            ],
            'colour' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'delivery' => [
                'type' => 'DATE',
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

        $this->forge->addKey('id_inisial', true); // Primary Key
        $this->forge->addForeignKey('no_model', 'master_pdk', 'no_model'); // Foreign Key
        $this->forge->createTable('master_inisial');
    }

    public function down()
    {
        $this->forge->dropTable('master_inisial');
    }
}
