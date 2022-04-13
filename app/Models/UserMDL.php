<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMDL extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'slug', 'status_id',  'email', 'nip', 'nim', 'role_id', 'jurusan_id'];

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
        $this->join('status', 'status.id = user.status_id');
        $this->join('jurusan', 'jurusan.id = user.jurusan_id');
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
        $this->where(['role_id' => 1]);
        return  $this->like('name', $keyword);
    }

    public function searhAdminID($id)
    {
        $this->table('user');
        $this->where(['id' => $id]);
        // dd($this->findAll());
        return  $this->findAll();
    }
}
