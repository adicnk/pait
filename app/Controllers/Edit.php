<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\SoalMDL;

class Edit extends BaseController
{
    protected $userModel, $loginModel, $soalModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->soalModel = new SoalMDL();
    }

    public function user($id)
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Form User Administrator / Mahasiswa",
            'url' => $this->request->getVar('url'),
            'user' => $this->userModel->searhAdminID($id)
        ];
        return view('form/edit-user', $data);
    }

    public function soal($id)
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Form Soal",
            'url' => $this->request->getVar('url'),
            'user' => $this->soalModel->searchSoal($id)
        ];
        return view('form/edit-soal', $data);
    }
}
