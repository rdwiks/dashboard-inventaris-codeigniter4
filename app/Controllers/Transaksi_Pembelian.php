<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;

class Transaksi_Pembelian extends BaseController
{
    protected $transaksi, $barang;

    public function __construct()
    {
        helper('form');
        $this->transaksi = new TransaksiModel();
        $this->barang = new BarangModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Transaksi Pembelian',
            'menu' => 'transaksi',
            'submenu' => 'pembelian',
            'transaksi' => $this->transaksi->asObject()->getAll(),
        ];
        return view('transaksi/pembelian/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi Pembelian',
            'menu' => 'transaksi',
            'submenu' => 'pembelian',
            'barang' => $this->barang->asObject()->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/pembelian/create', $data);
    }

    public function delete($id)
    {
        $this->transaksi->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('transaksi/pembelian');
    }

    public function save()
    {
        $this->transaksi->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_barang_id' => $this->request->getVar('nama_barang_id'),
            'supplier' => $this->request->getVar('supplier'),
            'jumlah' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('transaksi/pembelian');
    }
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Transaksi Pembelian',
            'menu' => 'transaksi',
            'submenu' => 'pembelian',
            'transaksi' => $this->transaksi->asObject()->where('id_pembelian', $id)->findAll(),
            'barang' => $this->barang->asObject()->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/pembelian/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['transaksi'] = $this->transaksi->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('transaksi/pembelian'));
    }
}
