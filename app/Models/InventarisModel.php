<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $returnType = 'object';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'nama_barang_id', 'total_stok', 'stok', 'harga', 'lokasi_barang_id', 'slug', 'kategori_barang_id'];

    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('inventaris');
    }

    public function getAll()
    {
        $this->builder->join('kategori_barang', 'kategori_barang.id_kategori = inventaris.kategori_barang_id');
        $this->builder->join('lokasi_barang', 'lokasi_barang.id_lokasi = inventaris.lokasi_barang_id');
        $this->builder->join('master_barang', 'master_barang.id_barang = inventaris.nama_barang_id');
        $query = $this->builder->get();

        return $query->getResult();
    }
}
