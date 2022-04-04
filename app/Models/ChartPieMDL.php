<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartPieMDL extends Model
{
    protected $table = 'kategori_soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'jumlah_soal'];

    public function getTotalSoal()
    {
        $this->findAll();
        $query = $this->get();
        $index = 1;
        $data = '[';
        foreach ($query->getResult('array') as $cc) :
            if ($index > 1) {
                $data = $data . ",";
            }
            $data = $data . strval($cc['jumlah_soal']);
            $index++;
        endforeach;
        $data = $data . ']';
        // dd($data);
        return $data;
        // return '[15,26,36,47]';
    }
}
