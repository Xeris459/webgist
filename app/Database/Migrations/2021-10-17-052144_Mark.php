<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mark extends Migration
{
    public function up()
    {
        $field = [
            'title' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'category_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ];

        $this->forge->addColumn('mark', $field);
    }

    public function down()
    {
        //
    }
}