<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterInisial extends Model
{
    protected $table            = 'master_inisial';
    protected $primaryKey       = 'id_inisial';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_model', 'style', 'inisial', 'po_inisial', 'colour', 'delivery', 'area', 'admin', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = ['style'];
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

    public function getInisialsByNoModel($noModel)
    {
        return $this->where('no_model', $noModel)->findAll();
    }
    public function getDataByIdInisial($idInisial)
    {
        // Sesuaikan dengan struktur tabel dan kolom yang sesuai di database
        return $this->find($idInisial);
    }
    public function getAllData()
    {
        return $this->db->table('master_inisial')
            ->join('master_pdk', 'master_pdk.no_model = master_inisial.no_model')
            ->get()
            ->getResultArray();
    }
    public function getArea($noModel)
    {
        return $this->where('no_model', $noModel)->first();
    }
    public function getAllDataWithFlowProses()
    {
        return $this->db->table('master_inisial')
            ->join('flow_proses', 'flow_proses.id_inisial = master_inisial.id_inisial')
            ->get()
            ->getResultArray();
    }
    public function getIdInisial($validate)
    {
        $result = $this->where('no_model', $validate['no_model'])
            ->where('area', $validate['area'])
            ->where('style', $validate['jc'])
            ->first(); // Menggunakan first() untuk mendapatkan satu baris pertama

        return $result;
    }
    public function getIdInisialByPdk($pdk)
    {
        $result = $this->where('no_model', $pdk)->findAll();
        return $result;
    }
    public function getIdForShipment($validate)
    {
        $result = $this->where('inisial', $validate['inisial'])
            ->where('no_model', $validate['no_model'])
            ->where('style', $validate['style'])
            ->findAll();
        return $result;
    }
    public function getIdForFLow($required)
    {
        $result = $this->where('no_model', $required['no_model'])->where('inisial', $required['inisial'])->first();
        return $result;
    }
    public function sumQTY($noModel)
    {
        $query = $this->selectSum('po_inisial', 'total_QTY') // Menambahkan alias untuk hasil sum
            ->where('no_model', $noModel)
            ->get();

        $result = $query->getRow();
        return $result->total_QTY;
    }
}
