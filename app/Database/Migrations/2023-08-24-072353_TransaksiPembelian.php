<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiPembelian extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_pembelian' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'supplier' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => 10, 3,
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
        $this->forge->addKey('id_pembelian', true);
        $this->forge->addForeignKey('nama_barang_id', 'master_barang', 'id_barang');
        $this->forge->createTable('transaksi_barang', true);
    }


    public function down()
    {
        $this->forge->dropForeignKey('transaksi_barang', 'transaksi_barang_nama_barang_id_foreign');
        $this->forge->dropTable('transaksi_barang', true);
    }
}
