<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginMDL extends Model
{
    protected $table = 'login';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['role_id', 'user_id', 'username', 'password', 'is_active', 'is_start'];

    public function search($userID)
    {
        if ($this->where(['role_id' => $userID])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delAdmin($id)
    {
        $this->where(['user_id' => $id]);
        $this->delete();
    }

    public function searchID($id)
    {
        $this->where(['user_id' => $id]);
        $login =  $this->findAll();
        foreach ($login as $lg) :
            return true;
        endforeach;
    }

    public function statusLogin($username, $password)
    {
        $this->like('username', $username);
        $this->like('password', $password);
        $query = $this->findAll();
        foreach ($query as $qry) {
            if ($qry) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function userID($username, $password)
    {
        $this->like('username', $username);
        $this->like('password', $password);
        $query = $this->findAll();
        foreach ($query as $qry) {
            if ($qry) {
                session()->set('userID', $qry['user_id']);
            }
            return;
        }
    }

    public function index()
    {
        return $this->findAll();
    }
}
