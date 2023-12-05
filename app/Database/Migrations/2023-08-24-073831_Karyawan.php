<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nip' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'no_ktp' => [
                'type'       => 'INT',
                'constraint' => 20,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'no_telepon' => [
                'type'       => 'INT',
                'constraint' => 13,
            ],
            'tempat_lahir' => [
                'type'       => 'DATE',
            ],
            'tanggal_lahir' => [
                'type'       => 'DATE',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'agama' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id_karyawan', true);
        $this->forge->createTable('karyawan', true);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan', true);
    }
}
