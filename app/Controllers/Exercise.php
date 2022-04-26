<?php

namespace App\Controllers;

use App\Models\ConfigMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;
use App\Models\LatihanMDL;
use App\Models\LoginMDL;
use App\Models\UserMDL;

class Exercise extends BaseController
{

    protected $soalModel, $configModel, $jawabanModel, $latihanModel, $loginModel, $userModel;

    public function __construct()
    {
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
        $this->configModel = new ConfigMDL();
        $this->latihanModel = new LatihanMDL();
        $this->loginModel = new LoginMDL();
        $this->userModel = new UserMDL();
    }

    public function index()
    {
        $data = [
            'title' => "PAIT @ PPNI"
        ];

        return view('exercise/login', $data);
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

    public function login()
    {
        $usr = $this->request->getVar('username');
        $pwd = $this->request->getVar('password');

        if (!$usr or !$pwd) {
            $data = [
                'title' => 'Login Status',
                'login' => $this->loginModel->index()
            ];
            return view('exercise/relogin', $data);
        } else {
            $loginStatus = $this->userModel->statusLogin($usr, $pwd);


            if ($loginStatus) {
                session()->set('userID', $loginStatus);
                $data = [
                    'title'   => "Dashboard"
                ];
                return view('exercise/getdashboard', $data);
            } else {
                $data = [
                    'title' => 'Login Status',
                    'login' => $this->loginModel->index()
                ];
                return view('exercise/relogin', $data);
            }
        }
    }

    public function dashboard()
    {
        $userID = session()->get('userID');
        session()->set('isFinish', false);
        $totalLatihan = $this->latihanModel->countLatihan($userID);
        $benar = $this->latihanModel->lastBenar($userID);
        $salah = $this->latihanModel->lastSalah($userID);
        $score = $this->latihanModel->lastScore($userID);

        if ($totalLatihan > 1) {
            $benarBefore = $this->latihanModel->benarBefore($userID);
            $persenBenar = ($benar - $benarBefore);
            $salahBefore = $this->latihanModel->salahBefore($userID);
            $persenSalah = ($salah - $salahBefore);
            $scoreBefore = $this->latihanModel->scoreBefore($userID);
            $persenScore = ($score - $scoreBefore);
        } else {
            $persenBenar = null;
            $persenSalah = null;
            $persenScore = null;
        }

        $cRec = $this->latihanModel->findAllID($userID);
        $cid = 1;
        $labelChart = null;
        $dataChart = null;
        foreach ($cRec as $c) {
            // $dataChart = $dataChart . "-" . $c['score'];
            if ($cid == 1) {
                $labelChart = '"' . substr($c['date'], 0, 10) . '",';
                $dataChart = $c['score'] . ',';
            }
            if ($cid > 1) {
                if ($cid == $totalLatihan) {
                    $labelChart = $labelChart . '"' . substr($c['date'], 0, 10) . '"';
                    $dataChart = $dataChart . $c['score'];
                } else {
                    $labelChart = $labelChart . '"' . substr($c['date'], 0, 10) . '",';
                    $dataChart = $dataChart . $c['score'] . ",";
                }
            } else {
            }
            $cid++;
        }

        $data = [
            'title' => "PAIT @ PPNI",
            'totalLatihan' => $totalLatihan,
            'lastLatihan' => $this->latihanModel->lastLatihan($userID),
            'benar' => $benar,
            'persenBenar' => $persenBenar,
            'salah' => $this->latihanModel->lastSalah($userID),
            'persenSalah' => $persenSalah,
            'lastScore' => $score,
            'persenScore' => $persenScore,
            'labelChart' => $labelChart,
            'dataChart' => $dataChart
        ];
        return view('exercise/dashboard', $data);
    }

    public function belajar()
    {
        $data = [
            'title' => "PAIT @ PPNI"
        ];
        return view('exercise/belajar', $data);
    }

    public function profile()
    {
        $data = [
            'title' => "PAIT @ PPNI",
            'user' => $this->userModel->searhAdminID(session()->get('userID')),
            'nilai_ratarata' => $this->latihanModel->nilaiRatarata(session()->get('userID'))
        ];
        return view('exercise/profile', $data);
    }

    public function about()
    {
        return view('exercise/about');
    }
}
