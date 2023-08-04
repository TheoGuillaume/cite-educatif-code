<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStructureCategorieView extends Migration
{
    public function up()
    {
        $sql = "
        CREATE OR REPLACE VIEW structure_categorie AS
        SELECT COUNT(str.id) AS nbr, COALESCE(cat.nom, 'Aucune categorie') AS nom
        FROM cs_struct str
        LEFT JOIN cs_categorie cat ON cat.id = str.id_categorie
        GROUP BY id_categorie;
        ";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS structure_categorie;");
    }
}
