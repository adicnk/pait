<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\SoalMDL;

class Edit extends BaseController
{
    protected $userModel, $soalModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->soalModel = new SoalMDL();
    }

    public function admin($id)
    {
        $user = $this->userModel->searchAdmin(1);
        foreach ($user as $usr) :
            dd($usr('name'));
        endforeach;
        $data = [
            'title'   => "Edit Form User Administrator / Mahasiswa",
            'url' => $this->request->getVar('url'),
            'user' => $this->userModel->searchAdmin($id)
        ];
        return view('form/edit_user', $data);
    }

    public function mahasiswa($id)
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Edit Form User Administrator / Mahasiswa",
            'user' => $this->userModel->searchMahasiswa($id)
        ];
        return view('form/edit_user', $data);
    }

    public function soal($id)
    {
        // d($this->request->getVar('url'));
        $data = [
            'title'   => "Edit Form Soal"
        ];
        return view('form/edit_soal', $data);
    }
}
