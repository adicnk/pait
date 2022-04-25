<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMDL extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'idx', 'slug', 'status_id',  'email', 'nip', 'nim', 'role_id', 'jurusan_id', 'username', 'password'];

    public function searchAdmin($keyword = false)
    {
        if ($keyword == false) {
            $this->table('user');
            $this->join('status', 'status.id = user.status_id');
            $this->join('jurusan', 'jurusan.id = user.jurusan_id', 'left');
            // dd($this->findall());
            return $this->where(['role_id' => 1]); // User is Administrator
        }
        $this->table('user');
        $this->join('jurusan', 'jurusan.id = user.jurusan_id');
        $this->join('status', 'status.id = user.status_id', 'right');
        $this->where(['role_id' => 1]);
        return  $this->like('name', $keyword);
    }

    public function searchMahasiswa($keyword = false)
    {
        if ($keyword == false) {
            $this->table('user');
            $this->join('jurusan', 'jurusan.id = user.jurusan_id');
            return  $this->where(['status_id' => 1]); // User is Mahasiswa
        }
        $this->table('user');
        $this->join('jurusan', 'jurusan.id = user.jurusan_id');
        return  $this->like('name', $keyword);
    }

    public function searhAdminID($id, $ops = false)
    {
        $this->table('user');
        $this->where(['idx' => $id]);
        $this->join('jurusan', 'jurusan.id = user.jurusan_id', 'left');
        return  $this->findAll();
    }

    public function statusLogin($username, $password)
    {
        $this->like('username', $username);
        $this->like('password', $password);
        $query = $this->findAll();
        foreach ($query as $qry) {
            if ($qry) {
                return $qry['id'];
            } else {
                return false;
            }
        }
    }

    public function delUser($id)
    {
        $this->delete(['id' => $id]);
    }

    public function countAdmin()
    {
        $this->table('user');
        $this->where(['role_id' => 1]);
        // dd($this->findAll());
        return $this->countAllResults();
    }

    public function countMahasiswa()
    {
        $this->table('user');
        $this->where(['status_id' => 1]);
        // dd($this->countAllResults());
        return $this->countAllResults();
    }

    public function countStaff()
    {
        $this->table('user');
        $this->where(['status_id' => 2]);
        // dd($this->countAllResults());
        return $this->countAllResults();
    }
}
