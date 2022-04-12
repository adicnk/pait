<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalMDL extends Model
{
    protected $table = 'soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'kategori_soal_id', 'is_picture', 'picture_url', 'is_audio', 'audio_url', 'is_choosen'];

    public function searchSoal($keyword = false)
    {
        if ($keyword == false) {
            $this->table('soal');
            return $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        }
        $this->table('soal');
        $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        return  $this->like('kname', $keyword);
    }
}
