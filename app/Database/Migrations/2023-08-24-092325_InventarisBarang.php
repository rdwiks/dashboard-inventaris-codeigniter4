<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InventarisBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_inventaris' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'lokasi_barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'kategori_barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => 10.3,
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
        $this->forge->addKey('id_inventaris', true);
        $this->forge->addForeignKey('kategori_barang_id', 'kategori_barang', 'id_kategori');
        $this->forge->addForeignKey('lokasi_barang_id', 'lokasi_barang', 'id_lokasi');
        $this->forge->addForeignKey('nama_barang_id', 'master_barang', 'id_barang');
        $this->forge->createTable('inventaris', true);
    }


    public function down()
    {
        $this->forge->dropForeignKey('inventaris', 'inventaris_kategori_barang_id_foreign');
        $this->forge->dropForeignKey('inventaris', 'inventaris_lokasi_barang_id_foreign');
        $this->forge->dropForeignKey('inventaris', 'inventaris_nama_barang_id_foreign');
        $this->forge->dropTable('inventaris', true);
    }
}
