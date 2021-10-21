<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
    public function up()
    {
        $field = [
            'tempat_ibadah' => [
                'type' => 'varchar',
                'constraint' => 255,
            ]
        ];

        $this->forge->addColumn('auth_groups', $field);
    }

    public function down()
    {
        //
    }
}