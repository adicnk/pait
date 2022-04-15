<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanMDL extends Model
{
    protected $table = 'jawaban';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['soal_id', 'jawabanA', 'jawabanB', 'jawabanC', 'jawabanD', 'jawabanE', 'jawaban_benar'];

    public function searchID($id)
    {
        $this->where(['soal_id' => $id]);
        $jawaban =  $this->findAll();
        foreach ($jawaban as $jw) :
            return $jw['id'];
        endforeach;
    }

    public function delJawaban($id)
    {
        $this->delete(['soal_id' => $id]);
    }
}
