<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $returnType = 'object';
    protected $allowedFields = ['transaksi_pembelian_id', 'transaksi_pengeluaran_id', 'inventaris_id'];

    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('laporan');
    }

    public function getAll()
    {
        $this->builder->join('inventaris', 'inventaris.id_inventaris = laporan.inventaris_id');
        $this->builder->join('transaksi_barang', 'transaksi_barang.id_pembelian = laporan.transaksi_pembelian_id');
        $this->builder->join('transaksi_pengeluaran', 'transaksi_pengeluaran.id_pengeluaran = laporan.transaksi_pengeluaran_id');

        $query = $this->builder->get();

        return $query->getResultArray();
    }
}
