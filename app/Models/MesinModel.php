<?php

namespace App\Models;

use CodeIgniter\Model;

class MesinModel extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jc', 'inisial', 'colour', 'deskripsi', 'admin']; // Sesuaikan dengan struktur tabel database 
}
