<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigMDL extends Model
{
    protected $table = 'config';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['total_soal'];
}
