<?php

namespace App\Models;

use CodeIgniter\Model;

class LatihanMDL extends Model
{
    protected $table = 'latihan';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['date', 'user_id', 'benar', 'salah', 'score'];

    public function findAllID($id)
    {
        $this->where(['user_id' => $id]);
        return $this->findAll();
    }

    public function nilaiRatarata($id)
    {
        $this->where(['user_id' => $id]);
        $userID = $this->findAll();
        $bagi = $this->countAll();

        $this->selectSum('score');
        $scoreSum = $this->findAll();
        // dd($userID);
        if ($userID) {
            foreach ($scoreSum as $q) {
                return $q['score'] / $bagi;
                return;
            }
        }
    }

    public function setDateLatihan($id, $value)
    {
        $this->where(['id' => $id]);
        $this->set('date', $value);
        $this->update();
        return;
    }

    public function countLatihan($id)
    {
        $this->where(['user_id' => $id]);
        return $this->countAllResults();
    }

    public function lastLatihan($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        foreach ($query as $q) {
            if ($q['id'] == 1) {
                return $q['date'];
            }
        }
        return;
    }

    public function lastBenar($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 1) {
                return $q['benar'];
            }
        }
        return;
    }
    public function benarBefore($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        // dd($query);
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 2) {
                return $q['benar'];
            }
            $idx++;
        }
        return;
    }

    public function lastSalah($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 1) {
                return $q['salah'];
            }
        }
        return;
    }
    public function salahBefore($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 2) {
                return $q['salah'];
            }
            $idx++;
        }
        return;
    }

    public function lastScore($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 1) {
                return $q['score'];
            }
        }
        return;
    }
    public function scoreBefore($id)
    {
        $this->where(['user_id' => $id]);
        $this->orderBy('id', 'DESC');
        $query = $this->findAll();
        $idx = 1;
        foreach ($query as $q) {
            if ($idx == 2) {
                return $q['score'];
            }
            $idx++;
        }
        return;
    }

    public function delLatihan($id)
    {
        $this->where(['user_id' => $id]);
        $query = $this->findAll();
        if ($query) {
            $this->where(['user_id' => $id]);
            $this->delete();
        }
        return;
    }
}
