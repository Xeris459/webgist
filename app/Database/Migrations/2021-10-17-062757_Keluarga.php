<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluarga extends Migration
{
    public function up()
    {
        $field = [
            'bersekolah' => [
                'type' => 'int',
                'constraint' => 1,
            ],
        ];

        $this->forge->addColumn('keluarga', $field);
    }

    public function down()
    {
        //
    }
}