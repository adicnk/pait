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
        $jawabArr = array_fill(0, $totalSoal, null);

        $status = true;
        $idx = 1;

        session()->set('soalArr', $soalArr);

        while ($status) {
            $randID = $this->randomID($totalSoal);
        }

        $data = [
            'title' => "PAIT @ PPNI",
            'soalIDX' => $soalArr
        ];
        return view('exercise/latihan');
    }

    public function randomID($totalSoal)
    {
        return rand(1, $totalSoal);
    }
}
