<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mark extends Migration
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
            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'color' => [
                'type' => 'varchar',
                'constraint' => 10,
            ],
            'longtitude' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'latitude' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255,
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
        $this->forge->addKey('users_id');
        $this->forge->createTable('mark');
    }

    public function down()
    {
        //
    }
}