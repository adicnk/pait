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
            'title'   => "Form Admin"
        ];
        return view('form/administrator', $data);
    }
}
