<?php

namespace App\Models;

use CodeIgniter\Model;

class PDKModels extends Model
{
    protected $table            = 'master_pdk';
    protected $primaryKey       = 'no_model';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_model', 'no_order', 'buyer', 'po_global', 'created_at', 'updated_at', 'admin', 'status'];

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

    public function validateModel($isModelExist)
    {
        $this->where('no_model', $isModelExist)->first();
        return $isModelExist;
    }

    public function getMasterData()
    {
        $this->join('master_inisial', 'master_inisial.no_model = master_pdk.no_model');

        $this->select('master_pdk.*,
                        master_inisial.inisial');
        $result = $this->findAll();
        return $result;
    }
    public function getPermintaanPacking()
    {
        return $this->where('status', 'Menunggu Approval')->findAll();
    }
    public function getApproved()
    {
        return $this->where('status', 'Approved')->findAll();
    }
    public function getDecline()
    {
        return $this->where('status', 'Decline')->findAll();
    }
}
