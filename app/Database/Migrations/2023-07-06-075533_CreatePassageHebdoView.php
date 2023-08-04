<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePassageHebdoView extends Migration
{
    public function up()
    {
        $sql = "
        CREATE OR REPLACE VIEW passage_hebdo as
        SELECT u.email, COUNT(*) AS nombre_utilisateurs
        FROM passage_utilisateur pu
        JOIN c_utilisateur u ON pu.id_user = u.id
        WHERE WEEK(pu.createAt) = WEEK(CURDATE())
        GROUP BY pu.id_user;
        ";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS passage_hebdo;");
    }
}
