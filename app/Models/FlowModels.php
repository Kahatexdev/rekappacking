<?php

namespace App\Models;

use CodeIgniter\Model;

class FlowModels extends Model
{
    protected $table            = 'flow_proses';
    protected $primaryKey       = 'id_proses';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_inisial',
        'keterangan',
        'proses_1',
        'proses_2',
        'proses_3',
        'proses_4',
        'proses_5',
        'proses_6',
        'proses_7',
        'proses_8',
        'proses_9',
        'proses_10',
        'proses_11',
        'proses_12',
        'proses_13',
        'proses_14',
        'proses_15',
        'created_at',
        'updated_at'
    ];

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

    public function getIdProses($id_inisial)
    {
        $result = $this->where('id_inisial', $id_inisial)
            ->first();

        return $result;
    }
}
