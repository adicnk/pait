<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigMDL extends Model
{
    protected $table = 'config';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['total_soal'];

    public function totalSoal()
    {
        $this->where(['id' => 1]);
        $query = $this->findAll();
        foreach ($query as $q) {
            return $q['total_soal'];
        }
    }

    public function nilaiMinimum()
    {
        $this->where(['id' => 1]);
        $query = $this->findAll();
        foreach ($query as $q) {
            return $q['nilai_min'];
        }
    }
}
