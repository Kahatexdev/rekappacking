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
    protected $allowedFields    = ['tgl_prod', 'id_proses', 'bagian', 'storage_awal', 'storage_akhir', 'qty_prod', 'bs_prod', 'kategori_bs', 'no_box', 'no_label', 'created_at', 'updated_at', 'admin', 'kode_shipment', 'shift'];

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
    public function getDataInGudang()
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->like('production.storage_akhir', 'GS');
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
        $this->where("(production.storage_awal LIKE 'PA02%' OR
                       production.storage_awal LIKE 'PR02%' OR 
                       production.storage_awal LIKE 'PA01%' OR 
                       production.storage_awal LIKE 'PR01%' OR 
                       production.storage_awal LIKE 'PB02%' OR 
                       production.storage_awal LIKE 'PA01%')");

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getPerbaikanArea($noModel)
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');
        $this->join('master_inisial', 'master_inisial.id_inisial = flow_proses.id_inisial');

        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             master_inisial.no_model
             ');
        $this->where('no_model', $noModel);

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->where("(
            production.storage_akhir LIKE 'PA02%' OR
                       production.storage_akhir LIKE 'PB02%' OR 
                       production.storage_akhir LIKE 'PA01%' OR 
                       production.storage_akhir LIKE 'PC02%' OR 
                       production.storage_akhir LIKE 'PG05%' OR 
                       production.storage_akhir LIKE 'PK07%' OR 
                       production.storage_akhir LIKE 'PL_07%' OR 
                       production.storage_akhir LIKE 'PD09%' OR 
                       production.storage_akhir LIKE 'PD08%' OR 
                       production.storage_akhir LIKE 'PF08%' OR 
                       production.storage_akhir LIKE 'PJ08%' OR 
                       production.storage_akhir LIKE 'PE10%' OR 
                       production.storage_akhir LIKE 'PM11%' OR 
                       production.storage_akhir LIKE 'PM11%' OR 
                       production.storage_akhir LIKE 'PB01%')");

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }
    public function getPerbaikanRosso($noModel)
    {
        $this->join('shipment', 'shipment.kode_shipment = production.kode_shipment');
        $this->join('flow_proses', 'flow_proses.id_proses = production.id_proses');
        $this->join('master_inisial', 'master_inisial.id_inisial = flow_proses.id_inisial');


        $this->select('production.*,
             shipment.delivery, shipment.po_shipment,
             flow_proses.proses_1, flow_proses.proses_2, flow_proses.proses_3, flow_proses.proses_4, flow_proses.proses_5, 
             ');
        $this->where('no_model', $noModel);

        // Tambahkan kondisi WHERE untuk filter storage_akhir null
        $this->where("(production.storage_akhir LIKE 'PR01%' OR
                        production.storage_akhir LIKE 'PR05%' OR
                        production.storage_akhir LIKE 'PR07%' OR
                        production.storage_akhir LIKE 'PR08%' OR
                        production.storage_akhir LIKE 'PR011%' OR
                        production.storage_akhir LIKE 'PR02%')");

        // Lakukan query dan kembalikan hasil
        $result = $this->findAll();
        return $result;
    }

    public function getDataRekapan()
    {
        $builder = $this->db->table('production');
        //  $builder->join('flow_proses', 'flow_proses.id_proses = production.id_proses');
        // $builder->join('master_inisial', 'master_inisial.id_inisial = flow_proses.id_inisial');
        //  $builder->join('master_pdk', 'master_pdk.no_model = master_inisial.no_model');
        $builder->join('shipment', 'shipment.kode_shipment = production.kode_shipment');

        // Pilih kolom yang ingin ditampilkan
        $builder->select(' 
    production.*,
         shipment.*');

        // Eksekusi query
        $query = $builder->get();

        // Mengembalikan hasil query sebagai array
        return $query->getResultArray();
    }


    public function existingData($dataInsert)
    {
        $query = $this->where('id_proses', $dataInsert['id_proses'])
            ->where('tgl_prod', $dataInsert['tgl_prod'])
            ->where('no_box', $dataInsert['no_box'])
            ->where('storage_akhir', $dataInsert['storage_akhir'])
            ->where('qty_prod', $dataInsert['qty_prod'])
            ->where('shift', $dataInsert['shift'])->get();
        $result = $query->getRow();
        return $result;
    }
    public function getIdProd($keyProd)
    {
        $qry = $this->where('id_proses', $keyProd['idProses'])->$this->where('kode_shipment', $keyProd['kdShipment'])->$this->where('no_label', $keyProd['noLabel'])->findAll();
        return $qry;
    }
}
