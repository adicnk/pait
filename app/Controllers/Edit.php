<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;

class Edit extends BaseController
{
    protected $userModel, $login;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
    }

    public function admin($id)
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Form User Administrator / Mahasiswa",
            'url' => $this->request->getVar('url'),
            'user' => $this->userModel->searhAdminID($id)
        ];
        return view('form/edit-user', $data);
    }
}
