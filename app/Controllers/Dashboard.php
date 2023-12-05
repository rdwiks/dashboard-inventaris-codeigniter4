<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\LaporanModel;
use App\Models\PengeluaranModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{

    protected $laporan, $inventaris, $pembelian, $pengeluaran;
    public function __construct()
    {
        $this->laporan = new LaporanModel();
        $this->inventaris = new InventarisModel();
        $this->pembelian = new TransaksiModel();
        $this->pengeluaran = new PengeluaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'content' => 'dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'pembelian' => $this->pembelian->asObject()->getAll(),
            'pengeluaran' => $this->pengeluaran->asObject()->findAll(),
            'inventaris' => $this->inventaris->asObject()->getAll(),
        ];
        return view('dashboard', $data);
    }
}
