<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jc', 'inisial', 'colour', 'deskripsi', 'admin']; // Sesuaikan dengan struktur tabel database 


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
}
