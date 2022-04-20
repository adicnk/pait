<?php

namespace App\Models;

use CodeIgniter\Model;

class LatihanMDL extends Model
{
    protected $table = 'latihan';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['date', 'score'];

    public function setDateLatihan($id, $value)
    {
        $this->where(['id' => $id]);
        $this->set('date', $value);
        $this->update();
        return;
    }
}
