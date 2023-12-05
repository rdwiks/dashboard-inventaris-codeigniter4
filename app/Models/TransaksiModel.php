<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi_barang';
    protected $primaryKey = 'id_pembelian';
    protected $retrunType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['supplier', 'nama_barang_id', 'tanggal',  'jumlah', 'harga'];

    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('transaksi_barang');
    }

    public function getAll()
    {
        $this->builder->join('master_barang', 'master_barang.id_barang = transaksi_barang.nama_barang_id');
        $query = $this->builder->get();

        return $query->getResult();
    }
}
