<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip', 'no_ktp', 'nama', 'email', 'tanggal_lahir', 'tempat_lahir', 'jenis_kelamin', 'agama', 'status', 'no_telepon', 'pendidikan', 'alamat', 'slug'];

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
