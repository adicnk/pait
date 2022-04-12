<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanMDL extends Model
{
    protected $table = 'jawaban';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['soal_id', 'jawabanA', 'jawabanB', 'jawabanC', 'jawabanD', 'jawabanE', 'jawaban_benar'];
}
