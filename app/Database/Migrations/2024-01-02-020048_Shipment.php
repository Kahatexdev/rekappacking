<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shipment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_shipment' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'id_inisial' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'delivery' => [
                'type' => 'DATE',
            ],
            'po_shipment' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'admin' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('kode_shipment', true);
        $this->forge->addForeignKey('id_inisial', 'master_inisial', 'id_inisial'); // Sesuaikan dengan nama tabel dan kolom primary key di tabel master_inisial

        $this->forge->createTable('shipment');
    }

    public function down()
    {
        $this->forge->dropTable('shipment');
    }
}
