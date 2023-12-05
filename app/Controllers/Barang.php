<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{

    protected $barang, $db, $builder, $respon;
    public function __construct()
    {
        helper('form');
        $this->barang = new BarangModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Barang',
            'menu' => 'asset',
            'submenu' => 'barang',
            'barang' => $this->barang->getBarang()
        ];
        return view('assets/barang/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Barang',
            'menu' => 'asset',
            'submenu' => 'barang',
            'barang' => $this->barang->getBarang(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/barang/create', $data);
    }
    public function save()
    { // validation input
        if (!$this->validate([
            'kode_barang' => [
                'rules' => 'required|is_unique[master_barang.kode_barang]',
                'errors' => [
                    'required' => 'Kode Barang  harus diisi.',
                    'is_unique' => 'Kode Barang  sudah ada.'
                ]
            ],

        ])) {
            return redirect()->to('assets/barang')->withInput();
        } //endValidation
        $this->barang->save([
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('assets/barang');
    }

    public function delete($id)
    {

        $this->barang->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('assets/barang');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'barang',
            'menu' => 'asset',
            'submenu' => 'barang',
            'barang' => $this->barang->where('id_barang', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('assets/barang/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['barang'] = $this->barang->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('assets/barang'));
    }

    public function data_barang()
    {
        $data = $this->db->get('master_barang')->result_array();
        var_dump($data);
    }
}
