<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Test extends Migration
{
    public function up()
    {
        echo "Running migration...\n";

        $this->forge->addField([
            'id'       => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'jc'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'inisial'  => ['type' => 'VARCHAR', 'constraint' => '8'],
            'colour'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'deskripsi'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'admin'  => ['type' => 'VARCHAR', 'constraint' => '28'],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true]

        ]);
        $this->forge->addKey('id', true);

        $this->forge->createTable('dataProduk');
        echo "Migration berhasil.\n";
    }

    public function down()
    {
        echo "Migration gagal.\n";

        // Drop your table if needed
        $this->forge->dropTable('data');
    }
}
