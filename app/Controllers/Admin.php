<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\ChartPieMDL;

class Admin extends BaseController
{
    protected $userModel, $chartPieModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->chartPieModel = new ChartPieMDL();
    }

    public function index()
    {
        $data = [
            'title'   => "Dashboard",
            'chartValueData' => $this->chartPieModel->getTotalSoal(),
            'chartLabelData' => $this->chartPieModel->getLabelSoal()
        ];
        return view('admin/dashboard', $data);
    }

    public function user()
    {

        // d($this->request->getVar('keyword'));

        // Search Block
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->userModel->searchAdmin($keyword);
            $title = 'Admin Name Search : "' . $keyword . '"';
        } else {
            $user = $this->userModel->searchAdmin();
            $title = "Admin List : All";
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
        return view('admin/administrator', $data);
    }

    public function soal()
    {

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
        return view('admin/soal', $data);
    }
}
