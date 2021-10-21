<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluarga extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'mark_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'NIK' => [
                'type' => 'INT',
                'constraint' => 18,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'birthday' => [
                'type' => 'date',
                'null' => true,
            ],
            'gender' => [
                'type' => 'enum',
                'constraint' => ['laki-laki', 'perempuan'],
                'null' => true,
            ],
            'isworker' => [
                'type' => 'int',
                'constraint' => 1,
                'default' => 0,
            ],
            'pekerjaan' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'pendapatan' => [
                'type' => 'int',
                'constraint' => 50,
                'null' => true,
            ],
            'asal_sekolah' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'jenjang_pendidikan' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'agama' => [
                'type' => 'enum',
                'constraint' => ['islam','katolik','kristen','budha','hindu'],
                'null' => true,
            ],
            'status' => [
                'type' => 'enum',
                'constraint' => ['menikah','belum menikah','janda','duda'],
                'null' => true,
            ],
            'kepala_keluarga' => [
                'type' => 'int',
                'constraint' => 1,
                'default' => 0,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('mark_id');             
        $this->forge->addKey('NIK', false, true);
        $this->forge->createTable('keluarga');
    }

    public function down()
    {
        //
    }
}