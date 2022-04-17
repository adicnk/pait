<?php

namespace App\Controllers;

use App\Models\ConfigMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;

class Exercise extends BaseController
{

    protected $soalModel, $configModel, $jawabanModel;

    public function __construct()
    {
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new SoalMDL();
        $this->configModel = new ConfigMDL();
    }

    public function index()
    {
        return view('exercise/dashboard');
    }

    public function latihan()
    {
        $totalSoal = $this->configModel->totalSoal();
        $soal = $this->soalModel->isChoosen();
        $soalArr = array_fill(0, $totalSoal, null);
        $soalTempArr = array_fill(0, $totalSoal, null);

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

        $data = [
            'title' => "PAIT @ PPNI",
            'soalIdx' => $soalArr,
            'soal' => $soal
        ];
        return view('exercise/latihan', $data);
    }

    public function randomID($total)
    {
        return rand(1, $total);
    }
}
