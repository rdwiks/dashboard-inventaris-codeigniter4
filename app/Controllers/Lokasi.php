<?php

namespace App\Controllers;

use App\Models\LokasiModel;

class Lokasi extends BaseController
{
    protected $lokasi;

    public function __construct()
    {
        $this->lokasi = new LokasiModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Lokasi',
            'menu' => 'asset',
            'submenu' => 'lokasi',
            'lokasi' => $this->lokasi->getlokasi()
        ];
        return view('assets/lokasi/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Lokasi',
            'menu' => 'asset',
            'submenu' => 'lokasi',
            'lokasi' => $this->lokasi->getlokasi(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/lokasi/create', $data);
    }
    public function save()
    {
        $this->lokasi->save([
            'nama_lokasi' => $this->request->getVar('nama_lokasi'),
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('assets/lokasi');
    }

    public function delete($id)
    {

        $this->lokasi->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('assets/lokasi');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Lokasi',
            'menu' => 'asset',
            'submenu' => 'lokasi',
            'lokasi' => $this->lokasi->where('id_lokasi', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/lokasi/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['lokasi'] = $this->lokasi->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('assets/lokasi'));
    }
}
