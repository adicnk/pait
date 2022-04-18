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

        $no = $this->request->getVar('id');
        session()->set('noId', $no);
        $soalArr = session()->get('soalArr');

        $pilihanA = $this->request->getVar('jawabanA');
        $pilihanB = $this->request->getVar('jawabanB');
        $pilihanC = $this->request->getVar('jawabanC');
        $pilihanD = $this->request->getVar('jawabanD');
        $pilihanE = $this->request->getVar('jawabanE');

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

        session()->set('jawabanArr', $answer);

        $no == 5 ? d(session()->get('jawabanArr')) : "";

        $data = [
            'title' => "Latihan Soal PAiT",
            'soalIdx' => $soalArr,
            'soal' => $soal,
            'total' => $totalSoal
        ];
        return view('exercise/latihan', $data);
    }
}
