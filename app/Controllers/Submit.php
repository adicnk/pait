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
        d($this->request->getVar());

        $roleID = $this->request->getVar('roleUser');
        $nimnip = $this->request->getVar('nimnipUser');
        $slug = url_title($this->request->getVar('namaUser'), '-', true);

        $this->userModel->save([
            'role_id' => $roleID,
            'name' => $this->request->getVar('namaUser'),
            'slug' => $slug,
            'email' => $this->request->getVar('emailUser')
        ]);

        //ID terakhir yg di buat di tabel user
        $db      = \Config\Database::connect();
        $lastID = $db->insertID();

        if ($this->request->getVar('roleUser') == 1) {
            $this->userModel->save([
                'id' => $lastID,
                'nip' => $this->request->getVar('nimnipUser')
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
        }
    }
}
