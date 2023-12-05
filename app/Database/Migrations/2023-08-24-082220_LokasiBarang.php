<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LokasiBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lokasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'nama_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
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
        $this->forge->addKey('id_lokasi', true);
        $this->forge->createTable('lokasi_barang');
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_barang');
    }
}
