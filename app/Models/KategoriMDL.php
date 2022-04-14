<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriMDL extends Model
{
    protected $table = 'soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['jumlah_soal'];
}
