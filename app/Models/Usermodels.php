<?php

namespace App\Models;

use CodeIgniter\Model;

class Usermodels extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function login($username, $password)
    {
        $user = $this->where(['username' => $username, 'password' => $password])->first();

        if (!$user) {
            return null;
        }

        return [
            'id' => $user['id_user'],
            'role' => $user['role'],
            'username' => $user['username']
        ];
    }
    public function validatePassword($str, string $field, array $data): bool
    {
        // Lakukan validasi keamanan kata sandi
        // Contoh: Memeriksa apakah kata sandi memiliki panjang minimal
        $minLength = 1;

        return strlen($data['password']) >= $minLength;
    }
}
