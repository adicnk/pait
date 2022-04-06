<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMDL extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'email', 'nip'];

    public function searchAdmin($keyword = false)
    {
        if ($keyword == false) {
            $this->table('user');
            return $this->where(['role_id' => 1]); // User is Administrator
        }
        $this->table('user');
        $this->where(['role_id' => 1]);
        return  $this->like('name', $keyword);
    }

    public function searchMahasiswa($keyword = false)
    {
        if ($keyword == false) {
            $this->table('user');
            return $this->where(['role_id' => 2]); // User is Administrator
        }
        $this->table('user');
        $this->where(['role_id' => 2]);
        return  $this->like('name', $keyword);
    }
}
