<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductionModel extends Model
{
    protected $table            = 'production';
    protected $primaryKey       = 'id_production';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_prod', 'id_proses', 'bagian', 'storage_awal', 'storage_akhir', 'qty_prod', 'bs_prod', 'kategori_bs', 'no_box', 'no_label', 'created_at', 'updated_at', 'admin', 'kode_shipment'];

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



    public function getAllData()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
         shipment.delivery, shipment.po_shipment,
         flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
         ');
        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getMesinProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->where('production.storage_akhir', null);

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getRossoProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'rs')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getSettingProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'st')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getHandprintProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'HNP')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getBordirProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'BO')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getLipatProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'LP')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getAplikasiroduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'APL')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getPotongCorakProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'PC')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getObrasProduksi()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'OB')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getStocklotData()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_akhir', 'STOCKLOT');
        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getDataOutGudang()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'GS')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getQbsData()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'QBS')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getQcData()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'QC')->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getOutPerbaikan()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_awal', 'PA01')
            ->like('production.storage_awal', 'PA02')
            ->like('production.storage_awal', 'PB01')
            ->where('production.storage_akhir IS NOT NULL');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getInPerbaikan()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_akhir', 'PA01')
            ->like('production.storage_akhir', 'PA02')
            ->like('production.storage_akhir', 'PB01');

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }

    public function getDataRekapan()
    {
    }
}
