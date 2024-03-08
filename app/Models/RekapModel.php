<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapModel extends Model
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



    public function sumMesin($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $idProses)
            ->like('storage_awal', 'RS')->where('storage_akhir', null)
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function sumRosso($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $idProses)
            ->like('storage_awal', 'RS')->where('storage_akhir IS NOT NULL')
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function sumSetting($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod') // Menambahkan alias untuk hasil sum
            ->where('id_proses', $idProses)
            ->like('storage_awal', 'ST')->like('storage_akhir', 'GS')
            ->get();

        $result = $query->getRow();

        // Menggunakan properti yang benar untuk mengakses hasil sum
        return $result->total_qty_prod;
    }
    public function sumPin($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses) // Konversi $idProses ke tipe data int
            ->where("(production.storage_akhir LIKE 'PA02%' OR production.storage_akhir LIKE 'PR02%' OR production.storage_akhir LIKE 'PA01%' OR production.storage_akhir LIKE 'PR01%' OR production.storage_akhir LIKE 'PB02%' OR production.storage_akhir LIKE 'PA01%')")
            ->get();

        $result = $query->getRow();

        return $result ? $result->total_qty_prod : 0;
    }
    public function sumPout($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses) // Konversi $idProses ke tipe data int
            ->where("(production.storage_awal LIKE 'PA02%' OR production.storage_awal LIKE 'PR02%' OR production.storage_awal LIKE 'PA01%' OR production.storage_awal LIKE 'PR01%' OR production.storage_awal LIKE 'PB02%' OR production.storage_awal LIKE 'PA01%')")
            ->like('storage_akhir', 'GS')
            ->get();

        $result = $query->getRow();

        return  $result->total_qty_prod;
    }

    public function sumStocklot($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses)
            ->like('production.storage_akhir', 'STOCKLOT')
            ->get();
        $result = $query->getRow();

        return  $result->total_qty_prod;
    }
    public function sumGsin($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses)
            ->like('production.storage_akhir', 'GS')
            ->get();
        $result = $query->getRow();

        return  $result->total_qty_prod;
    }
    public function sumGsOut($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses)
            ->like('production.storage_awal', 'GS')
            ->get();
        $result = $query->getRow();

        return  $result->total_qty_prod;
    }
    public function sumPBSTC($idProses)
    {
        $query = $this->selectSum('qty_prod', 'total_qty_prod')
            ->where('id_proses', $idProses) // Konversi $idProses ke tipe data int
            ->where("(production.storage_awal LIKE 'PA02%' OR production.storage_awal LIKE 'PR02%' OR production.storage_awal LIKE 'PA01%' OR production.storage_awal LIKE 'PR01%' OR production.storage_awal LIKE 'PB02%' OR production.storage_awal LIKE 'PA01%')")
            ->like('storage_akhir', 'STOCKLOT')
            ->get();

        $result = $query->getRow();

        return  $result->total_qty_prod;
    }
    public function sumDeffect($idProses)
    {
        $query = $this->selectSum('deffect', 'totalDeffect')
            ->where('id_proses', $idProses)->get();
        $result = $query->getRow();
        return $result->totalDeffect;
    }
}
