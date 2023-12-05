<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'transaksi_pembelian_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'transaksi_pengeluaran_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'inventaris_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id_laporan', true);
        $this->forge->addForeignKey('transaksi_pembelian_id', 'transaksi_barang', 'id_pembelian');
        $this->forge->addForeignKey('transaksi_pengeluaran_id', 'transaksi_pengeluaran', 'id_pengeluaran');
        $this->forge->addForeignKey('inventaris_id', 'inventaris', 'id_inventaris');
        $this->forge->createTable('laporan', true);
    }


    public function down()
    {
        $this->forge->dropForeignKey('laporan', 'laporan_transaksi_pembelian_id_foreign');
        $this->forge->dropForeignKey('laporan', 'laporan_transaksi_pengeluaran_id_foreign');
        $this->forge->dropForeignKey('laporan', 'laporan_inventaris_id_foreign');
        $this->forge->dropTable('laporan', true);
    }
}
