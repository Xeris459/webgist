<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $field = [
            'lat' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'long' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
        ];

        $this->forge->addColumn('users', $field);
    }

    public function down()
    {
        //
    }
}