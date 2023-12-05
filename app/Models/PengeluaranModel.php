<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'transaksi_pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $allowedFields = ['tanggal', 'keterangan', 'kategori', 'harga'];
    protected $useTimestamps = true;

    public function getPengeluaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
