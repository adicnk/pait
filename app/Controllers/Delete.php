<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;

class Delete extends BaseController
{
    protected $userModel, $login;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
    }

    public function user($id)
    {
        // dd($this->request->getVar('url'));
        $url = $this->request->getVar('url');
        if ($url == 'admin') {
            $this->userModel->delUser($id);
            $this->loginModel->delAdmin($id);

            $user = $this->userModel->searchAdmin();
            $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
            $data = [
                'title' => "Data " . $url . " berhasil di Delete",
                'url' => $url
            ];
        } else {
            $this->userModel->delUser($id);
            if ($this->loginModel->search($id) == 1) { //search in login is admin?
                $this->loginModel->delAdmin($id);
            };

            $data = [
                'title' => "Data " . $url . " berhasil di Delete",
                'url' => $url
            ];
        }
        return view('form/delete-user', $data);
    }
}
