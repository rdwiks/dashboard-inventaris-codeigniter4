<?php

namespace App\Controllers;

use App\Models\PengeluaranModel;

class Transaksi_Pengeluaran extends BaseController
{
    protected $transaksi;

    public function __construct()
    {
        helper('form');
        $this->transaksi = new PengeluaranModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Transaksi Pengeluaran',
            'menu' => 'transaksi',
            'submenu' => 'pengeluaran',
            'transaksi' => $this->transaksi->asObject()->getPengeluaran(),
        ];
        return view('transaksi/pengeluaran/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi Pengeluaran',
            'menu' => 'transaksi',
            'submenu' => 'pengeluaran',
            'transaksi' => $this->transaksi->asObject()->getPengeluaran(),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/pengeluaran/create', $data);
    }

    public function delete($id)
    {
        $this->transaksi->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('transaksi/pengeluaran');
    }

    public function save()
    {
        $this->transaksi->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('transaksi/pengeluaran');
    }
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Transaksi Pengeluaran',
            'menu' => 'transaksi',
            'submenu' => 'pengeluaran',
            'transaksi' => $this->transaksi->asObject()->where('id_pengeluaran', $id)->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/pengeluaran/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['transaksi'] = $this->transaksi->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('transaksi/pengeluaran'));
    }
}
