<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Karyawan extends BaseController
{
    protected $karyawan;
    public function __construct()
    {
        helper('form');
        $this->karyawan = new KaryawanModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Karyawan',
            'menu' => 'profil',
            'submenu' => 'karyawan',
            'karyawan' => $this->karyawan->getKaryawan(),
        ];
        return view('karyawan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Karyawan',
            'menu' => 'profil',
            'submenu' => 'karyawan',
            'karyawan' => $this->karyawan->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('karyawan/create', $data);
    }

    public function delete($id)
    {
        $this->karyawan->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('karyawan');
    }
    public function save()
    {
        // validation input
        if (!$this->validate([
            'nip' => [
                'rules' => 'required|is_unique[karyawan.nip]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                    'is_unique' => '{field}  produk sudah ada.'
                ]
            ],
            'no_ktp' => [
                'rules' => 'required|is_unique[karyawan.no_ktp]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'nama' => [
                'rules' => 'required[karyawan.nama]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required[karyawan.pendidikan]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'email' => [
                'rules' => 'required[karyawan.email]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required[karyawan.tanggal_lahir]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required[karyawan.tempat_lahir]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[karyawan.jenis_kelamin]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'agama' => [
                'rules' => 'required[karyawan.agama]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'no_telepon' => [
                'rules' => 'required[karyawan.no_telepon]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required[karyawan.alamat]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ],
            'status' => [
                'rules' => 'required[karyawan.status]',
                'errors' => [
                    'required' => '{field}  produk harus diisi.',
                ]
            ]

        ])) {
            return redirect()->to('karyawan/create')->withInput();
        } //endValidation
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->karyawan->save([
            'nip' => $this->request->getVar('nip'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'nama' => $this->request->getVar('nama'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'email' => $this->request->getVar('email'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'slug' => $slug,
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'agama' => $this->request->getVar('agama'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('karyawan');
    }

    public function edit($slug = null)
    {
        $data = [
            'title' => 'Edit Produk',
            'menu' => 'karyawan',
            'submenu' => '',
            'karyawan' => $this->karyawan->asObject()->where('slug', $slug)->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('karyawan/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['karyawan'] = $this->karyawan->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(site_url('karyawan'));
    }


    // Rekapitulasi Karyawan
    public function exportKaryawan()
    {
        $spreadsheet = new Spreadsheet();
        $karyawan = $this->karyawan->asObject()->getKaryawan();

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
            ->mergeCells('F1:M1')
            ->setCellValue('F1', '=now()');

        $spreadsheet->getActiveSheet()->getStyle('F1')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        // End Date

        // Address Company
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A2', "Alamat: Jl. Sanggar Kencana XXV No.11A, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286")
            ->mergeCells("A2:M2")
            ->getStyle('A2')
            ->getFont()
            ->setSize(8);
        // End Address Company

        // Phone Company
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A3', "Telepon: 0811-2213-096 | NIB:0203010241412")
            ->mergeCells("A3:M3")
            ->getStyle('A3')
            ->getFont()
            ->setSize(8);
        // Phone Company

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A4', 'No')
            ->setCellValue('B4', 'NIP')
            ->setCellValue('C4', 'No.KTP')
            ->setCellValue('D4', 'Nama')
            ->setCellValue('E4', 'Agama')
            ->setCellValue('F4', 'Pendidikan')
            ->setCellValue('G4', 'Jenis Kelamin')
            ->setCellValue('H4', 'Tanggal Lahir')
            ->setCellValue('I4', 'Tempat Lahir')
            ->setCellValue('J4', 'Email')
            ->setCellValue('K4', 'Alamat')
            ->setCellValue('L4', 'No.Telepon')
            ->setCellValue('M4', 'Status');

        $column = 5;
        foreach ($karyawan as $p) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $p->id_karyawan)
                ->setCellValue('B' . $column, $p->nip)
                ->setCellValue('C' . $column, $p->no_ktp)
                ->setCellValue('D' . $column, $p->nama)
                ->setCellValue('E' . $column, $p->agama)
                ->setCellValue('F' . $column, $p->pendidikan)
                ->setCellValue('G' . $column, $p->jenis_kelamin)
                ->setCellValue('H' . $column, $p->tanggal_lahir)
                ->setCellValue('I' . $column, $p->tempat_lahir)
                ->setCellValue('J' . $column, $p->email)
                ->setCellValue('K' . $column, $p->alamat)
                ->setCellValue('L' . $column, $p->no_telepon)
                ->setCellValue('M' . $column, $p->status);
            $column++;
        }

        // Bold Header
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A4:M4')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor('FFFFFFF')
            ->setARGB('99CCFF');

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
        // End Bold Header

        // Bold Title Column
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A4:M4')->applyFromArray($styleArray);
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

        $spreadsheet->getActiveSheet()->getStyle('A4:M' . ($column - 1))->applyFromArray($styleArray);
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
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Karyawan';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
