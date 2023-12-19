<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'jc'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'inisial'  => ['type' => 'VARCHAR', 'constraint' => '8'],
            'colour'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'deskripsi'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'admin'  => ['type' => 'VARCHAR', 'constraint' => '28'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('data');
    }

    public function down()
    {
        $this->forge->dropTable('data');
    }
}
