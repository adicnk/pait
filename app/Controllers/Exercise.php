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
        $this->jawabanModel = new JawabanMDL();
        $this->configModel = new ConfigMDL();
    }

    public function index()
    {
        return view('exercise/dashboard');
    }

    public function soal()
    {
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

    public function selesai($part)
    {
        $soal = $this->soalModel->isChoosen();
        $totalSoal = $this->configModel->totalSoal();

        session()->set('noId', $totalSoal);
        $soalArr = session()->get('soalArr');

        dd($this->request->getVar());

        $pilihanA = $this->request->getVar('jawabanA');
        $pilihanB = $this->request->getVar('jawabanB');
        $pilihanC = $this->request->getVar('jawabanC');
        $pilihanD = $this->request->getVar('jawabanD');
        $pilihanE = $this->request->getVar('jawabanE');

        $answer = session()->get('jawabanArr');

        if ($pilihanA) {
            $answer[0] = $pilihanA ? 1 : null;
        }
        if ($pilihanB) {
            $answer[0] = $pilihanB ? 2 : null;
        }
        if ($pilihanC) {
            $answer[0] = $pilihanC ? 3 : null;
        }
        if ($pilihanD) {
            $answer[0] = $pilihanD ? 4 : null;
        }
        if ($pilihanE) {
            $answer[0] = $pilihanE ? 5 : null;
        }

        session()->set('jawabanArr', $answer);
        // $totalSoal == 5 ? dd(session()->get('jawabanArr')) : "";

        $data = [
            'title' => "Latihan Soal PAiT",
            'soalIdx' => $soalArr,
            'soal' => $soal,
            'total' => $totalSoal
        ];
        return view('exercise/latihan', $data);

        switch ($part) {
            case 'selesai':
                return view('exercise/selesai');
                break;

            case 'score':
                break;
        }
    }
}
