<?php

namespace App\Controllers;

class Exercise extends BaseController
{
    public function index()
    {
        return view('exercise/dashboard');
    }
}
