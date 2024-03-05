<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'usigned'        => TRUE,
                'auto_increment' => TRUE
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],

            'token' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],

            'senha' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}