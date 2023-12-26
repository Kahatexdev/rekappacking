<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterProses extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_proses' => 'MC01A',],
            ['nama_proses' => 'MC01B',],
            ['nama_proses' => 'MC02B',],
            ['nama_proses' => 'MC02C',],
            ['nama_proses' => 'MC05G',],
            ['nama_proses' => 'MC07K',],
            ['nama_proses' => 'MCO7L',],
            ['nama_proses' => 'MC09D',],
            ['nama_proses' => 'MC08D',],
            ['nama_proses' => 'MC08F',],
            ['nama_proses' => 'MC08J',],
            ['nama_proses' => 'MC10E',],
            ['nama_proses' => 'MC11N',],
            ['nama_proses' => 'RS01',],
            ['nama_proses' => 'RS02',],
            ['nama_proses' => 'RS05',],
            ['nama_proses' => 'RS07',],
            ['nama_proses' => 'RS08',],
            ['nama_proses' => 'RS11',],
            ['nama_proses' => 'ST01',],
            ['nama_proses' => 'ST02',],
            ['nama_proses' => 'ST05',],
            ['nama_proses' => 'ST07',],
            ['nama_proses' => 'ST08',],
            ['nama_proses' => 'ST11',],
            ['nama_proses' => 'GS01',],
            ['nama_proses' => 'GS02',],
            ['nama_proses' => 'GS05',],
            ['nama_proses' => 'GS07',],
            ['nama_proses' => 'GS08',],
            ['nama_proses' => 'GS11',],
            ['nama_proses' => 'PCK_1',],
            ['nama_proses' => 'PCK_2',],
            ['nama_proses' => 'PCK_5',],
            ['nama_proses' => 'PCK_7',],
            ['nama_proses' => 'PCK_8',],
            ['nama_proses' => 'PCK_11',],
            ['nama_proses' => 'PCK_STC',],
            ['nama_proses' => 'PCK_STK',],
            ['nama_proses' => 'QAD01',],
            ['nama_proses' => 'PC_01',],
            ['nama_proses' => 'PC_07',],
            ['nama_proses' => 'QC_02',],
            ['nama_proses' => 'QC_11',],
            ['nama_proses' => '07',],
            ['nama_proses' => 'WL01',],
            ['nama_proses' => 'STK01',],
            ['nama_proses' => 'APL001',],
            ['nama_proses' => 'HNP01',],
            ['nama_proses' => 'OB01',],
            ['nama_proses' => 'LK01',],
            ['nama_proses' => 'FOT01',],
            ['nama_proses' => 'LP01',],
            ['nama_proses' => 'SON_01',],
            ['nama_proses' => 'QC01',],
        ];

        $this->db->table('master_proses')->insertBatch($data);
    }
}
