<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalMDL extends Model
{
    protected $table = 'soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'idx', 'kategori_soal_id', 'is_picture', 'picture_url', 'is_audio', 'audio_url', 'is_choosen'];

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

    public function searchSoalID($id)
    {
        $this->where(['id' => $id]);
        return $this->findAll();
    }

    public function getJumlahSoal($id)
    {
        $this->where(['kategori_soal_id' => $id]);
        $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        return $this->countAllResults();
    }

    public function delSoal($id)
    {
        $this->delete(['id' => $id]);
    }

    public function isChoosen()
    {
        $this->where(['is_choosen' => 1]);
        $this->join('jawaban', 'jawaban.soal_id = soal.id');
        return $this->findAll();
    }
}
