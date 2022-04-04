<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'school'   => "PPNI"
        ];
        return view('admin/dashboard', $data);
    }
}
