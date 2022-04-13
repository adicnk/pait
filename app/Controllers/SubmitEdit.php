<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;

class SubmitEdit extends BaseController
{
    protected $userModel, $loginModel, $soalModel, $jawabanModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
    }

    public function admin($id)
    {
        // dd($this->request->getVar());
        $url = $this->request->getVar('url');
        $roleID = $this->request->getVar('roleUser');
        $nimnip = $this->request->getVar('nimnipUser');
        $slug = url_title($this->request->getVar('namaUser'), '-', true);
        $statusID = $this->request->getVar('statusUser');

        $this->userModel->save([
            'id' => $id,
            'idx' => $id,
            'role_id' => $roleID,
            'name' => $this->request->getVar('namaUser'),
            'slug' => $slug,
            'jurusan_id' => $this->request->getVar('jurusanUser'),
            'status_id' => $statusID,
            'email' => $this->request->getVar('emailUser'),
            'nim' => $nimnip,
            'nip' => $nimnip
        ]);

        if ($this->loginModel->searchID($id)) {
            $this->loginModel->save([
                'id' => $this->loginModel->searchID($id),
                'role_id' => $roleID,
                'user_id' => $id,
                'username' => $this->request->getVar('usernameUser'),
                'password' => $this->request->getVar('passwordUser'),
                'is_active' => 1
            ]);
        }
        // dd($url);
        if ($url == 'admin') {
            return redirect()->to('../../admin/user');
        } else {
            return redirect()->to('../../admin/mahasiswa');
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
            'is_picture' => $isPicture == "on" ? 1 : null,
            'picture_url' => $fileGambar,
            'is_audio' => $isAudio == "on" ? 1 : null,
            'audio_url' => $fileAudio,
            'is_choosen' => $isChoosen == "on" ? 1 : null
        ]);

        //ID terakhir yg di buat di tabel soal
        $db      = \Config\Database::connect();
        $lastID = $db->insertID();

        $this->jawabanModel->save([
            'soal_id' => $lastID,
            'jawabanA' => $this->request->getVar('jawabanA') ? $this->request->getVar('jawabanA') : null,
            'jawabanB' => $this->request->getVar('jawabanB') ? $this->request->getVar('jawabanB') : null,
            'jawabanC' => $this->request->getVar('jawabanC') ? $this->request->getVar('jawabanC') : null,
            'jawabanD' => $this->request->getVar('jawabanD') ? $this->request->getVar('jawabanD') : null,
            'jawabanE' => $this->request->getVar('jawabanE') ? $this->request->getVar('jawabanE') : null,
            'jawaban_benar' => $this->request->getVar('jawabanBenar')
        ]);

        return redirect()->to('../admin/soal');
    }
}
