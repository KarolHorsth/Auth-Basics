<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTokenToLogin extends Migration
{
    public function up()
    {
        $this->forge->addColumn('login', [
            'token' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('login', 'token');
    }
}
