<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Production extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_production' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tgl_prod' => [
                'type' => 'DATE',
            ],
            'tgl_erp' => [
                'type' => 'DATE',
            ],
            'id_proses' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'bagian' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'storage_awal' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'storage_akhir' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'qty_prod' => [
                'type' => 'DOUBLE',
            ],
            'bs_prod' => [
                'type' => 'DOUBLE',
            ],
            'kategori_bs' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'no_box' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_label' => [
                'type' => 'INT',
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
            'kode_shipment' => [
                'type' => 'INT',
                'unsigned' => true,

            ]
        ]);

        $this->forge->addKey('id_production', true); // Primary Key
        $this->forge->addForeignKey('id_proses', 'flow_proses', 'id_proses'); // Foreign Key
        $this->forge->createTable('production');
    }

    public function down()
    {
        $this->forge->dropTable('production');
    }
}
