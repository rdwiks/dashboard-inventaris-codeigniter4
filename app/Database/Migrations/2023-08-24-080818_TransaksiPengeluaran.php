<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiPengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint'     => '255',
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
        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->createTable('transaksi_pengeluaran', true);
    }


    public function down()
    {
        $this->forge->dropTable('transaksi_pengeluaran', true);
    }
}
