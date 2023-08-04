<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDateInsInVActStructUser extends Migration
{
    public function up()
    {
        $sql = "CREATE OR REPLACE VIEW v_act_struct_user as
        select v.id_acteur, v.id_struct,v.nom_social,v.sigle, ca.id,ca.photo_profil,ca.id_utilisateur, ca.nom,ca.prenom,ca.poste,ca.etat,ca.date_ins from v_act_struct v
RIGHT JOIN ca_acteur ca on ca.id = v.id_acteur;";
        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS v_act_struct_user;");
    }
}
