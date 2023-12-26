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
    protected $allowedFields    = ['no_model', 'style', 'inisial', 'po_inisial', 'colour', 'delvery', 'area', 'admin', 'created_at', 'updated_at'];

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


    public function getMasterPDK()
    {
        $builder = $this->db->table('master_inisial');
        $builder->select('master_inisial.*, master_pdk.*');
        $builder->join('master_pdk', 'master_pdk.no_model = master_inisial.no_model', 'left');

        $query = $builder->get();
        return $query->getResult();
    }
    public function inputInisial()
    {
    }
}
