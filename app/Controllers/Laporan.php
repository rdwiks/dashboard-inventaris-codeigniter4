<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\LaporanModel;
use App\Models\PengeluaranModel;
use App\Models\TransaksiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
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
            'title' => 'Laporan',
            'menu' => 'laporan',
            'submenu' => '',
            'pembelian' => $this->pembelian->asObject()->getAll(),
            'inventaris' => $this->inventaris->asObject()->getAll(),
            'pengeluaran' => $this->pengeluaran->asObject()->findAll(),

        ];

        return view('laporan/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'Laporan',
            'menu' => '',
            'submenu' => 'Detail Laporan',
            'laporan' => $this->laporan->asObject()->find($id),
            'inventaris' => $this->inventaris->asObject()->find($id),
        ];

        return view('laporan/show', $data);
    }

    // Transaparansi Inventory
    public function exportInventaris()
    {
        $spreadsheet = new Spreadsheet();
        $inventaris = $this->inventaris->asObject()->getAll();

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
            ->setCellValue('B4', 'Kode Barang')
            ->setCellValue('C4', 'Tanggal')
            ->setCellValue('D4', 'Nama Barang')
            ->setCellValue('E4', 'Kategori Barang')
            ->setCellValue('F4', 'Lokasi Barang')
            ->setCellValue('G4', 'Stok')
            ->setCellValue('H4', 'Harga');

        $column = 5;
        foreach ($inventaris as $p) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $p->id_inventaris)
                ->setCellValue('B' . $column, $p->kode_barang)
                ->setCellValue('C' . $column, $p->tanggal)
                ->setCellValue('D' . $column, $p->nama_barang)
                ->setCellValue('E' . $column, $p->nama_kategori)
                ->setCellValue('F' . $column, $p->nama_lokasi)
                ->setCellValue('G' . $column, $p->stok)
                ->setCellValue('H' . $column, $p->harga);
            $column++;
        }

        // Bold Header
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A4:I4')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor('FFFFFFF')
            ->setARGB('99CCFF');

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);
        // End Bold Header

        // Bold Title Column
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A4:I4')->applyFromArray($styleArray);
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

        $spreadsheet->getActiveSheet()->getStyle('A4:I' . ($column - 1))->applyFromArray($styleArray);
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
        $fileName = 'laporan Inventaris';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    // Transaparansi Pembelian
    public function exportPembelian()
    {
        $spreadsheet = new Spreadsheet();
        $pembelian = $this->pembelian->asObject()->getAll();

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
            ->setCellValue('B4', 'Supplier')
            ->setCellValue('C4', 'Nama Barang')
            ->setCellValue('D4', 'Tanggal')
            ->setCellValue('E4', 'Jumlah')
            ->setCellValue('F4', 'Harga');

        $column = 5;
        foreach ($pembelian as $p) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $p->id_pembelian)
                ->setCellValue('B' . $column, $p->supplier)
                ->setCellValue('C' . $column, $p->nama_barang)
                ->setCellValue('D' . $column, $p->tanggal)
                ->setCellValue('E' . $column, $p->jumlah)
                ->setCellValue('F' . $column, $p->harga);
            $column++;
        }

        // Bold Header
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A4:F4')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor('FFFFFFF')
            ->setARGB('99CCFF');

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);
        // End Bold Header

        // Bold Title Column
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A4:F4')->applyFromArray($styleArray);
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

        $spreadsheet->getActiveSheet()->getStyle('A4:F' . ($column - 1))->applyFromArray($styleArray);
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
        $fileName = 'laporan Transaksi Pembelian';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
    // Transaparansi Pengeluaran
    public function exportPengeluaran()
    {
        $spreadsheet = new Spreadsheet();
        $pengeluaran = $this->pengeluaran->asObject()->getPengeluaran();

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
            ->setCellValue('B4', 'Tanggal')
            ->setCellValue('C4', 'Keterangan')
            ->setCellValue('D4', 'Kategori')
            ->setCellValue('E4', 'Harga');

        $column = 5;
        foreach ($pengeluaran as $p) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $p->id_pengeluaran)
                ->setCellValue('B' . $column, $p->tanggal)
                ->setCellValue('C' . $column, $p->keterangan)
                ->setCellValue('D' . $column, $p->kategori)
                ->setCellValue('E' . $column, $p->harga);

            $column++;
        }

        // Bold Header
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A4:E4')
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
        $spreadsheet->getActiveSheet()->getStyle('A4:E4')->applyFromArray($styleArray);
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

        $spreadsheet->getActiveSheet()->getStyle('A4:E' . ($column - 1))->applyFromArray($styleArray);
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
        $fileName = 'laporan Transaksi Pengeluaran';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
