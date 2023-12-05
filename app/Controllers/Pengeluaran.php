<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PengeluaranModel;


class Pengeluaran extends BaseController
{
    protected $pengeluaran;

    public function __construct()
    {
        helper('form');
        $this->pengeluaran = new PengeluaranModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Pengeluaran',
            'menu' => 'pengeluaran',
            'submenu' => '',
            'pengeluaran' => $this->pengeluaran->getPengeluaran()
        ];
        return view('pengeluaran/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Pengeluaran',
            'menu' => 'pengeluaran',
            'submenu' => '',
            'pengeluaran' => $this->pengeluaran->getPengeluaran(),
            'validation' => \Config\Services::validation()
        ];
        return view('pengeluaran/create', $data);
    }
    public function save()
    {
        // validation input
        if (!$this->validate([

            'kode' => [
                'rules' => 'required[tb_pengeluaran.kode]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'nama' => [
                'rules' => 'required[tb_pengeluaran.nama]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],

            'tanggal' => [
                'rules' => 'required[tb_pengeluaran.tanggal]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],


            'satuan' => [
                'rules' => 'required[tb_pengeluaran.satuan]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required[tb_pengeluaran.harga]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'total' => [
                'rules' => 'required[tb_pengeluaran.total]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
        ])) {
            return redirect()->to('pengeluaran/create')->withInput();
        } //endValidation
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pengeluaran->save([
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'nama' => $this->request->getVar('nama'),
            'total' => $this->request->getVar('total'),
            'satuan' => $this->request->getVar('satuan'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'kode' => $this->request->getVar('kode'),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('pengeluaran');
    }

    public function delete($id)
    {

        $this->pengeluaran->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('pengeluaran');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Pengeluaran',
            'menu' => 'pengeluaran',
            'submenu' => '',
            'pengeluaran' => $this->pengeluaran->where('id_pengeluaran', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('pengeluaran/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['pengeluaran'] = $this->pengeluaran->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('pengeluaran'));
    }

    public function export()
    {
        $pengeluaran = new PengeluaranModel();
        $pengeluaran = $pengeluaran->findAll();
        $spreadsheet = new Spreadsheet();

        // Name Company
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', "PT NUSAMITEK PUTRA JAYA")
            ->mergeCells("A1:E1")
            ->getStyle('A1')
            ->getFont()
            ->setSize(16);
        // End Company

        // Date
        $spreadsheet
            ->getActiveSheet()
            ->mergeCells('F1:G1')
            ->setCellValue('F1', '=now()');

        $spreadsheet->getActiveSheet()->getStyle('F1')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        // End Date

        // Address Company
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', "Alamat: Jl. Sanggar Kencana XXV No.11A, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286")
            ->mergeCells("A2:G2")
            ->getStyle('A2')
            ->getFont()
            ->setSize(8);
        // End Address Company

        // Phone Company
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', "Telepon: 0811-2213-096 | NIB:0203010241412")
            ->mergeCells("A3:G3")
            ->getStyle('A3')
            ->getFont()
            ->setSize(8);
        // Phone Company

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A4', 'No')
            ->setCellValue('B4', 'Kode')
            ->setCellValue('C4', 'Tanggal')
            ->setCellValue('D4', 'Nama')
            ->setCellValue('E4', 'Deskripsi')
            ->setCellValue('F4', 'Total')
            ->setCellValue('G4', 'Satuan')
            ->setCellValue('H4', 'Harga');

        $column = 5;
        foreach ($pengeluaran as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['id_pengeluaran'])
                ->setCellValue('B' . $column, $data['kode'])
                ->setCellValue('C' . $column, $data['tanggal'])
                ->setCellValue('D' . $column, $data['nama'])
                ->setCellValue('E' . $column, $data['deskripsi'])
                ->setCellValue('F' . $column, $data['total'])
                ->setCellValue('G' . $column, $data['satuan'])
                ->setCellValue('H' . $column, $data['harga']);
            $column++;
        }

        // Bold Header
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A4:G4')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor('FFFFFFF')
            ->setARGB('99CCFF');

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);
        // End Bold Header

        // Bold Title Column
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A4:H4')->applyFromArray($styleArray);
        // End Bold Title Column

        // Border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '0000000']
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A4:H' . ($column - 1))->applyFromArray($styleArray);
        // End Border

        // Set Print
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $spreadsheet->getActiveSheet()->getPageMargins()->setTop(1);
        $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.75);
        $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.75);
        $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(1);
        $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);
        // End Print

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pengeluaran';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
