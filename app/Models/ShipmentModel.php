<?php

namespace App\Models;

use CodeIgniter\Model;

class ShipmentModel extends Model
{
    protected $table            = 'shipment';
    protected $primaryKey       = 'kode_shipment';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_inisial', 'delivery', 'po_shipment', 'created_at', 'updated_at', 'admin'];

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

    public function getKodeShipment($validateShipment)
    {
        $kode_shipment = $this->where('id_inisial', $validateShipment['inisial'])
            // ->where('delivery', $validateShipment['delivery'])
            ->first();

        return $kode_shipment;
    }
    public function getIdInisial($kode_shipment)
    {
        $id_inisial = $this->where('kode_shipment', $kode_shipment)->first();
        return $id_inisial;
    }
}
