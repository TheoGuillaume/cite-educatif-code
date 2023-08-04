<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumndateinscritoview extends Migration
{
    public function up()
    {
        $sql = "CREATE OR REPLACE VIEW v_cs_stru_user_cat AS SELECT cs.id,
        cs.id_utilisateur,
        c.email,
        cs.id_categorie,
        ca.nom as nomcategorie,
        cs.nom_social,
        cs.siren,
        cs.email_siege,
        cs.photo_logo,
        cs.etat,
        cs_referent.nom as nom_ref,
        cs_referent.prenom as prenom_ref,
        cs_referent.fonction as ref_fonction,
        cs.date_ins
    FROM cs_struct cs
        JOIN c_utilisateur c on cs.id_utilisateur = c.id
        left JOIN cs_categorie ca on cs.id_categorie = ca.id
        left join cs_referent on cs.id_utilisateur = cs_referent.id_utilisateur
    order by cs.date_ins desc;";
        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS v_cs_stru_user_cat;");
    }
}
