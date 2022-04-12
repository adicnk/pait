<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;

class Submit extends BaseController
{
    protected $userModel, $loginModel, $soalModel, $jawabanModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
    }

    public function admin()
    {
        // dd($this->request->getVar());

        $roleID = $this->request->getVar('roleUser');
        $nimnip = $this->request->getVar('nimnipUser');
        $slug = url_title($this->request->getVar('namaUser'), '-', true);
        $statusID = $this->request->getVar('statusUser');

        $this->userModel->save([
            'role_id' => $roleID,
            'name' => $this->request->getVar('namaUser'),
            'slug' => $slug,
            'jurusan_id' => $this->request->getVar('jurusanUser'),
            'status_id' => $statusID,
            'email' => $this->request->getVar('emailUser')
        ]);

        //ID terakhir yg di buat di tabel user
        $db      = \Config\Database::connect();
        $lastID = $db->insertID();

        if ($roleID == 1) {
            if ($statusID == 1) {
                $this->userModel->save([
                    'id' => $lastID,
                    'nim' => $nimnip
                ]);
            } else {
                $this->userModel->save([
                    'id' => $lastID,
                    'nip' => $nimnip
                ]);
            }
            if ($this->loginModel->search($lastID)) {
                $this->loginModel->save([
                    'role_id' => $roleID,
                    'user_id' => $lastID,
                    'username' => $this->request->getVar('usernameUser'),
                    'password' => $this->request->getVar('passwordUser'),
                    'is_active' => 1
                ]);
                return redirect()->to('../admin/user');
            }
        } else {
            if ($statusID = 1) {
                $this->userModel->save([
                    'id' => $lastID,
                    'nim' => $this->request->getVar('nimnipUser')
                ]);
            } else {
                $this->userModel->save([
                    'id' => $lastID,
                    'nip' => $this->request->getVar('nimnipUser')
                ]);
            }
            return redirect()->to('../admin/mahasiswa');
        }
    }

    public function soal()
    {
        $isPicture = $this->request->getVar('isPicture');
        $fileGambar = $this->request->getVar('fileGambar');
        $isAudio = $this->request->getVar('isAudio');
        $fileAudio = $this->request->getVar('fileAudio');
        $isChoosen = $this->request->getVar('isChoosen');
        // d($this->request->getVar());

        $this->soalModel->save([
            'kategori_soal_id' => $this->request->getVar('kategoriSoal'),
            'name' => $this->request->getVar('isiSoal'),
            'is_picture' => $isPicture ? 1 : 0,
            'picture_url' => $fileGambar,
            'is_audio' => $isAudio ? 1 : 0,
            'audio_url' => $fileAudio,
            'is_choosen' => $isChoosen
        ]);

        //ID terakhir yg di buat di tabel soal
        $db      = \Config\Database::connect();
        $lastID = $db->insertID();

        $this->jawabanModel->save([
            'soal_id' => $lastID,
            'jawabanA' => $this->request->getVar('jawabanA'),
            'jawabanB' => $this->request->getVar('jawabanB'),
            'jawabanC' => $this->request->getVar('jawabanC'),
            'jawabanD' => $this->request->getVar('jawabanD'),
            'jawabanE' => $this->request->getVar('jawabanE'),
            'jawaban_benar' => $this->request->getVar('jawabanBenar')
        ]);

        return redirect()->to('../admin/soal');
    }
}
