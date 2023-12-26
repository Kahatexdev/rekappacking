<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterProses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_master_proses' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_proes' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ]
        ]);
        $this->forge->addKey('id_master_proses', true); // Primary Key
        $this->forge->createTable('master_proses');;
    }

    public function down()
    {
        $this->forge->dropTable('master_proses');
    }
}
