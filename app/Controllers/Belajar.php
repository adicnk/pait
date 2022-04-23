<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;


class Belajar extends BaseController
{
    protected $userModel, $loginModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
    }

    public function index()
    {
        $data = [
            'title' => "PAIT @ PPNI"
        ];
        return view('belajar/start', $data);
    }
}
