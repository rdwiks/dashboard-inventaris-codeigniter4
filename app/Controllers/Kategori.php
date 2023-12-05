<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        helper('form');
        $this->kategori = new KategoriModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'menu' => 'asset',
            'submenu' => 'kategori',
            'kategori' => $this->kategori->getKategori()
        ];
        return view('assets/kategori/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Kategori',
            'menu' => 'asset',
            'submenu' => 'kategori',
            'kategori' => $this->kategori->getKategori(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/kategori/create', $data);
    }
    public function save()
    {
        $this->kategori->save([
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('assets/kategori');
    }

    public function delete($id)
    {

        $this->kategori->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('kategori');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Kategori',
            'menu' => 'assets',
            'submenu' => 'Kategori',
            'kategori' => $this->kategori->where('id_kategori', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/kategori/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['kategori'] = $this->kategori->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('assets/kategori'));
    }
}
