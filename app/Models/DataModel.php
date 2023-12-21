<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'dataproduk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jc', 'inisial', 'colour', 'deskripsi', 'admin', 'creaeted_at', 'updated_at']; // Sesuaikan dengan struktur tabel database 

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function search($search, $start, $length)
    {
        return $this->select('*')
            ->like('id', $search)
            ->orLike('jc', $search)

            ->limit($length, $start)
            ->get()
            ->getResultArray();
    }

    public function searchCount($search)
    {
        return $this->like('id', $search)
            ->orLike('jc', $search)
            // Tambahkan kondisi pencarian untuk kolom lainnya sesuai kebutuhan
            ->countAllResults();
    }

    protected function beforeInsert(array $data)
    {
        // Set created_at to the current date and time
        $data['created_at'] = date('Y-m-d');

        return $data;
    }
}
