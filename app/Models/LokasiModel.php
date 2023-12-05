<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table = 'lokasi_barang';
    protected $primaryKey = 'id_lokasi';
    protected $allowedFields = ['nama_lokasi', 'kode_lokasi'];
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;

    public function getLokasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
