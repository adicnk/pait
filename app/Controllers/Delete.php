<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;
use App\Models\LatihanMDL;

class Delete extends BaseController
{
    protected $userModel, $loginModel, $soalModel, $jawabanModel, $latihanModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
        $this->latihanModel = new LatihanMDL();
    }

    public function user($id)
    {
        // dd($this->request->getVar('url'));
        $url = $this->request->getVar('url');
        if ($url == 'admin') {
            $this->userModel->delUser($id);
            $this->loginModel->delAdmin($id);

            $data = [
                'title' => "Data " . $url . " berhasil di Delete",
                'url' => $url
            ];
        } else {
            $this->userModel->delUser($id);
            if ($this->loginModel->search($id) == 1) { //search in login is admin?
                $this->loginModel->delAdmin($id);
            };

            $this->latihanModel->delLatihan($id);

            $data = [
                'title' => "Data " . $url . " berhasil di Delete",
                'url' => $url
            ];
        }
        $this->latihanModel->delLatihan($id); // delete latihan
        return view('form/delete-user', $data);
    }

    public function soal($id)
    {
        $query = $this->soalModel->searchSoalID($id);

        // Delete the file from folder
        foreach ($query as $q) {
            $fileGambar = $q['picture_url'];
            $fileGambar ? unlink('img/' . $fileGambar) : '';
            $fileSuara = $q['audio_url'];
            $fileSuara ? unlink('aud/' . $fileSuara) : '';
        }

        $this->soalModel->delSoal($id);
        $this->jawabanModel->delJawaban($id);

        $data = [
            'title' => "Data soal berhasil di Delete",
            'url' => 'soal'
        ];
        return view('form/delete-soal', $data);
    }
}
