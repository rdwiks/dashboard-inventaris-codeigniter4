<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_barang';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'kode_kategori'];
    protected $useTimestamps = true;

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
