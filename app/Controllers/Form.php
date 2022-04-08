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
        $data = [
            'title'   => "Form User Administrator / Mahasiswa"
        ];
        return view('form/user', $data);
    }
}
