<?php

namespace App\Models;

use CodeIgniter\Model;

class PerjalananModel extends Model
{
    protected $table            = 'production';
    protected $primaryKey       = 'id_production';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_prod', 'id_proses', 'bagian', 'storage_awal', 'storage_akhir', 'qty_prod', 'bs_prod', 'kategori_bs', 'no_box', 'no_label', 'created_at', 'updated_at', 'admin', 'kode_shipment', 'shift', 'deffect'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getDataMesin($validate)
    {

        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $validate['idProses'])
            ->where('no_box', $validate['noBox'])->where('no_label', $validate['noLabel'])
            ->like('storage_awal', 'RS')->where('storage_akhir', null)
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function getDataRosso($validate)
    {

        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $validate['idProses'])
            ->where('no_box', $validate['noBox'])->where('no_label', $validate['noLabel'])
            ->like('storage_awal', 'RS')->where('storage_akhir IS NOT NULL')
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function getDataSetting($validate)
    {

        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $validate['idProses'])
            ->where('no_box', $validate['noBox'])->where('no_label', $validate['noLabel'])
            ->like('storage_awal', 'ST')->where('storage_akhir IS NOT NULL')
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function getDataGudang($validate)
    {

        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $validate['idProses'])
            ->where('no_box', $validate['noBox'])->where('no_label', $validate['noLabel'])
            ->like('storage_awal', 'GS')->where('storage_akhir IS NOT NULL')
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
}
