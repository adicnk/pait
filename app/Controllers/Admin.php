<?php

namespace App\Controllers;

use App\Models\ChartPieMDL;

class Admin extends BaseController
{
    protected $chartPieModel;

    public function __construct()
    {
        $this->chartPieModel = new ChartPieMDL();
    }

    public function index()
    {
        $data = [
            'title'   => "Dashboard",
            'chartValueData' => $this->chartPieModel->getTotalSoal(),
            'chartLabelData' => "['Direct', 'Referral', 'Social','Politic']"
        ];
        return view('admin/dashboard', $data);
    }
}
