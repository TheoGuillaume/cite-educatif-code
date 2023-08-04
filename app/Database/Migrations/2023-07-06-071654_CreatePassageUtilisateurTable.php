<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePassageUtilisateurTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'createAt' => [
                'type' => 'DATE',
                'default' => date('Y-m-d')
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'c_utilisateur', 'id');
        $this->forge->createTable('passage_utilisateur');
    }

    public function down()
    {
        $this->forge->dropTable('passage_utilisateur');
    }
}
