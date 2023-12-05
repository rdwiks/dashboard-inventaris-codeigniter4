<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\InventarisModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;

class Inventaris extends BaseController
{
    protected $inventaris, $barang, $lokasi, $kategori;

    public function __construct()
    {
        helper('form');
        $this->inventaris = new InventarisModel();
        $this->lokasi = new LokasiModel();
        $this->kategori = new KategoriModel();
        $this->barang = new BarangModel();
    }


    public function index()
    {
        $data = [
            'menu' => 'inventaris',
            'submenu' => '',
            'title' => 'inventaris',
            'inventaris' => $this->inventaris->asObject()->getAll(),
        ];
        return view('inventaris/index', $data);
    }

    public function create()
    {
        $data = [
            'menu' => 'inventaris',
            'submenu' => '',
            'title' => 'inventaris',
            'barang' => $this->barang->asObject()->findAll(),
            'kategori' => $this->kategori->asObject()->findAll(),
            'lokasi' => $this->lokasi->asObject()->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('inventaris/create', $data);
    }

    public function delete($id)
    {
        $this->inventaris->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('inventaris');
    }
    public function save()
    {
        // validation input
        if (!$this->validate([
            'nama_barang_id' => [
                'rules' => 'is_unique[inventaris.nama_barang_id]',
                'errors' => [
                    'is_unique' => 'Nama barang sudah ada.',
                ]
            ],
            'tanggal' => [
                'rules' => 'required[inventaris.tanggal]',
                'errors' => [
                    'required' => 'Tanggal harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required[inventaris.harga]',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                ]
            ],
            'stok' => [
                'rules' => 'required[inventaris.stok]',
                'errors' => [
                    'required' => 'Stok harus diisi.',
                ]
            ],
            'kategori' => [
                'rules' => 'is_unique[inventaris.kategori_barang_id]',
                'errors' => [
                    'is_unique' => 'Kategori barang harus diisi.',
                ]
            ],
            'lokasi' => [
                'rules' => 'is_unique[inventaris.lokasi_barang_id]',
                'errors' => [
                    'is_unique' => 'Lokasi barang harus diisi.',
                ]
            ],

        ])) {
            return redirect()->to('inventaris/create')->withInput();
        } //endValidation
        $this->inventaris->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_barang_id' => $this->request->getVar('nama_barang_id'),
            'kategori_barang_id' => $this->request->getVar('kategori_barang_id'),
            'lokasi_barang_id' => $this->request->getVar('lokasi_barang_id'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('inventaris');
    }

    public function edit($id)
    {
        $data = [
            'menu' => 'inventaris',
            'submenu' => '',
            'title' => 'Edit inventaris',
            'inventaris' => $this->inventaris->asObject()->where('id_inventaris', $id)->find(),
            'kategori' => $this->kategori->asObject()->findAll(),
            'lokasi' => $this->lokasi->asObject()->findAll(),
            'barang' => $this->barang->asObject()->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('inventaris/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['inventaris'] = $this->inventaris->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('inventaris'));
    }
}
