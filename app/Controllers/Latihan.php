<?php

namespace App\Controllers;

use App\Models\ConfigMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;

class Latihan extends BaseController
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
        $soal = $this->soalModel->isChoosen();
        $totalSoal = $this->configModel->totalSoal();

        $soalArr = session()->get('soalArr');

        $pilihanA = $this->request->getVar('jawabanA');
        $pilihanB = $this->request->getVar('jawabanB');
        $pilihanC = $this->request->getVar('jawabanC');
        $pilihanD = $this->request->getVar('jawabanD');
        $pilihanE = $this->request->getVar('jawabanE');

        $no = $this->request->getVar('id');
        $answer = session()->get('jawabanArr');

        if ($pilihanA) {
            $answer[$no - 2] = $pilihanA ? 1 : null;
        }
        if ($pilihanB) {
            $answer[$no - 2] = $pilihanB ? 2 : null;
        }
        if ($pilihanC) {
            $answer[$no - 2] = $pilihanC ? 3 : null;
        }
        if ($pilihanD) {
            $answer[$no - 2] = $pilihanD ? 4 : null;
        }
        if ($pilihanE) {
            $answer[$no - 2] = $pilihanE ? 5 : null;
        }

        session()->set('noId', $no);
        session()->set('jawabanArr', $answer);

        // $no == $totalSoal + 1 ? dd(session()->get('jawabanArr')) : "";
        if ($no == $totalSoal + 1) {
            $answer = session()->get('jawabanArr');
            $benar = 0;
            $salah = 0;
            $diisi = 0;
            $kosong = 0;
            for ($x = 0; $x < $totalSoal; $x++) {
                $this->soalModel->searchJawabanBenar($soalArr[$x], $answer[$x]) ? $benar++ : $salah++;
                $answer[$x] == null ? $kosong++ : $diisi++;
            }
            $score = $benar / $totalSoal * 100;
            d($score);
            $data = [
                'title' => "Score Latihan Soal PAiT",
                'benar' => $benar,
                'salah' => $salah,
                'diisi' => $diisi,
                'kosong' => $kosong,
                'score' => $score
            ];
            return view('exercise/selesai', $data);
        }

        $data = [
            'title' => "Latihan Soal PAiT",
            'soalIdx' => $soalArr,
            'soal' => $soal,
            'total' => $totalSoal
        ];
        return view('exercise/latihan', $data);
    }
}
