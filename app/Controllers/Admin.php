<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\SoalMDL;
use App\Models\ChartPieMDL;
use App\Models\ConfigMDL;
use App\Models\LoginMDL;

class Admin extends BaseController
{
    protected $userModel, $chartPieModel, $soalModel, $configModel, $loginModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->soalModel = new SoalMDL();
        $this->chartPieModel = new ChartPieMDL();
        $this->configModel = new ConfigMDL();
        $this->loginModel = new LoginMDL();
    }

    public function index($links = false)
    {
        //Akses from side menu
        //======================
        if ($links) {
            switch ($links) {
                case "user":
                    // d($this->request->getVar('keyword'));                    
                    $user = $this->userModel->searchAdmin();
                    $title = "Admin List : All";

                    $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
                    $data = [
                        'title' => $title,
                        'user'  => $this->userModel->paginate(5, 'user'),
                        'pager' => $this->userModel->pager,
                        'currentPage' => $currentPage
                    ];
                    return view('admin/administrator', $data);
                    break;

                case "mahasiswa":
                    // d($this->request->getVar('keyword'));

                    // Search Block
                    $keyword = $this->request->getVar('keyword');
                    if ($keyword) {
                        $user = $this->userModel->searchMahasiswa($keyword);
                        $title = 'Mahasiswa Name Search : "' . $keyword . '"';
                    } else {
                        $user = $this->userModel->searchMahasiswa();
                        $title = "Mahasiswa List : All";
                    }

                    $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
                    $data = [
                        'title' => $title,
                        'user'  => $this->userModel->paginate(5, 'user'),
                        'pager' => $this->userModel->pager,
                        'currentPage' => $currentPage
                    ];
                    return view('admin/mahasiswa', $data);
                    break;

                case "soal":
                    // d($this->request->getVar('keyword'));

                    // Search Block
                    $keyword = $this->request->getVar('keyword');
                    if ($keyword) {
                        $user = $this->soalModel->searchSoal($keyword);
                        $title = 'Soal Name Search : "' . $keyword . '"';
                    } else {
                        $soal = $this->soalModel->searchSoal();
                        $title = "Soal List : All";
                    }

                    $currentPage = $this->request->getVar('page_soal') ? $this->request->getVar('page_soal') : 1;
                    $data = [
                        'title' => $title,
                        'soal'  => $this->soalModel->paginate(5, 'soal'),
                        'pager' => $this->soalModel->pager,
                        'currentPage' => $currentPage
                    ];
                    return view('admin/soal', $data);
                    break;
                case 'dashboard':
                    $data = [
                        'title'   => "Dashboard",
                        'totalAdmin' => $this->userModel->countAdmin(),
                        'totalMahasiswa' => $this->userModel->countMahasiswa(),
                        'totalStaff' => $this->userModel->countStaff(),
                        'totalSoalUjian' => $this->soalModel->countAllUjian(),
                        'chartValueData' => $this->chartPieModel->getTotalSoal(),
                        'chartLabelData' => $this->chartPieModel->getLabelSoal()
                    ];
                    return view('admin/dashboard', $data);
                    break;
            }
        }
    }


    //Akses from admin/user cari button
    //=================================
    public function user()
    {
        $keyword = $this->request->getVar('keyword');
        $user = $this->userModel->searchAdmin($keyword);
        if ($keyword) {
            $title = 'Admin Name Search : "' . $keyword . '"';
        } else {
            $title = 'Admin List : All';
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => $title,
            'user'  => $this->userModel->paginate(5, 'user'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/administrator', $data);
    }

    public function mahasiswa()
    {
        $keyword = $this->request->getVar('keyword');
        $user = $this->userModel->searchMahasiswa($keyword);
        if ($keyword) {
            $title = 'Mahasiswa Name Search : "' . $keyword . '"';
        } else {
            $title = 'Mahasiswa List : All';
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => $title,
            'user'  => $this->userModel->paginate(5, 'user'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/mahasiswa', $data);
    }

    public function soal()
    {
        $keyword = $this->request->getVar('keyword');
        $user = $this->soalModel->searchSoal($keyword);
        if ($keyword) {
            $title = 'Soal Name Search : "' . $keyword . '"';
        } else {
            $title = 'Soal List : All';
        }
        $currentPage = $this->request->getVar('page_soal') ? $this->request->getVar('page_soal') : 1;
        $data = [
            'title' => $title,
            'soal'  => $this->soalModel->paginate(5, 'soal'),
            'pager' => $this->soalModel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/soal', $data);
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
            return view('form/relogin', $data);
        } else {
            $loginStatus = $this->loginModel->statusLogin($usr, $pwd);
            $data = [
                'title'   => "Dashboard",
                'totalAdmin' => $this->userModel->countAdmin(),
                'totalMahasiswa' => $this->userModel->countMahasiswa(),
                'totalStaff' => $this->userModel->countStaff(),
                'totalSoal' => $this->soalModel->countAll(),
                'chartValueData' => $this->chartPieModel->getTotalSoal(),
                'chartLabelData' => $this->chartPieModel->getLabelSoal()
            ];

            if ($loginStatus) {
                return view('form/getdashboard', $data);
            } else {
                $data = [
                    'title' => 'Login Status',
                    'login' => $this->loginModel->index()
                ];
                return view('form/relogin', $data);
            }
        }
    }
}
