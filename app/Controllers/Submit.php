<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;

class Submit extends BaseController
{
    protected $userModel, $loginModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
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
}
