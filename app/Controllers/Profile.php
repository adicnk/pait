<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\LatihanMDL;

class Profile extends BaseController
{
    protected $userModel, $loginModel, $latihanModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->latihanModel = new LatihanMDL();
    }

    public function index()
    {
        $data = [
            'title' => "PAIT @ PPNI",
            'user' => $this->userModel->searhAdminID(session()->get('userID')),
            'nilai_ratarata' => $this->latihanModel->nilaiRatarata(session()->get('userID'))
        ];
        return view('profile/mahasiswa', $data);
    }
}
