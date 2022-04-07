<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginMDL extends Model
{
    protected $table = 'login';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['role_id', 'user_id', 'username', 'password', 'is_active', 'is_start'];

    public function search($userID)
    {
        if ($this->where(['role' => $userID])) {
            return 1;
        } else {
            return 0;
        }
    }
}
