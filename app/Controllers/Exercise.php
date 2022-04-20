<?php

namespace App\Controllers;

use App\Models\ConfigMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;
use App\Models\LatihanMDL;

use CodeIgniter\I18n\Time;

class Exercise extends BaseController
{

    protected $soalModel, $configModel, $jawabanModel, $latihanModel;

    public function __construct()
    {
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
        $this->configModel = new ConfigMDL();
        $this->latihanModel = new LatihanMDL();
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard PAIT"
        ];

        return view('exercise/dashboard', $data);
    }

    public function soal()
    {
        //for dashboard exercise
        $this->latihanModel->save([
            'date' =>  new Time('now', 'Asia/Jakarta')
        ]);
        //ID terakhir yg di buat di tabel soal
        $db      = \Config\Database::connect();
        $latihanID = $db->insertID();
        session()->set('latihanID', $latihanID);

        $soal = $this->soalModel->isChoosen();
        $totalSoal = $this->configModel->totalSoal();
        $no = $this->request->getVar('id');

        $soalArr = array_fill(0, $totalSoal, null);
        $soalTempArr = array_fill(0, $totalSoal, null);
        $jawabanArr = array_fill(0, $totalSoal, null);

        for ($x = 0; $x < $totalSoal; $x++) {
            $randID = $this->randomID($totalSoal);
        }

        $totalArr = count($soalTempArr) - 1;
        for ($x = 0; $x < $totalSoal; $x++) {
            $soalArr[$x] = $x + 1;
            $soalTempArr[$x] = $x + 1;
        }
        while ($totalArr) {
            for ($x = 0; $x <= $totalArr; $x++) {
                $totalArr = $totalArr - $x;
                $z = $soalArr[$totalArr];
                $randID = $this->randomID($totalArr);
                $p = $soalArr[$randID];
                $soalArr[$randID] = $z;
                $soalArr[$totalArr] =  $p;
            }
        }

        session()->set('noId', 1);
        session()->set('soalArr', $soalArr);
        session()->set('jawabanArr', $jawabanArr);

        $data = [
            'title' => "Latihan Soal PAIT",
            'soalIdx' => $soalArr,
            'soal' => $soal,
            'total' => $totalSoal
        ];

        return view('exercise/latihan', $data);
    }

    public function randomID($total)
    {
        return rand(1, $total);
    }
}
