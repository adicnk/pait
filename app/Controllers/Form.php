<?php

namespace App\Controllers;

use App\Models\UserMDL;

class Form extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
    }

    public function admin()
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Form User Administrator / Mahasiswa",
            'url' => $this->request->getVar('url')
        ];
        return view('form/user', $data);
    }

    public function soal()
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Form Soal"
        ];
        return view('form/soal', $data);
    }
}
