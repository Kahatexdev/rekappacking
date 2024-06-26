<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FlowProses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_proses' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_inisial' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'proses_1' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_2' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_3' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_4' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_5' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_6' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_7' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_8' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_9' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_10' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_11' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_12' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_13' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_14' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'proses_15' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->addKey('id_proses', true); // Primary Key
        $this->forge->addForeignKey('id_inisial', 'master_inisial', 'id_inisial'); // Foreign Key
        $this->forge->createTable('flow_proses');;
    }

    public function down()
    {
        $this->forge->dropTable('flow_proses');
    }
}
