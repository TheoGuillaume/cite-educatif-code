<?php

namespace App\Models;

use CodeIgniter\Model;

class v_cs_stru_user_cat extends Model
{
    protected $table = 'v_cs_stru_user_cat';

    protected $returnType = 'App\Entities\V_cs_stru_user_cat';

    protected $allowedFields = ['id_utilisateur', 'email', 'id_categorie', 'nomcategorie', 'nom_social', 'siren', 'email_siege', 'photo_logo', 'etat', 'nom_ref', 'prenom_ref', 'ref_fonction', 'date_ins'];

    public function paginatestruct($perPage, $sort = null)
    {
        $this->where(['etat' => 1]);
        if ($sort) {
            $this->orderBy($sort);
        }

        return $this->paginate($perPage);
    }
    public function paginatestructunactif($perPage, $sort = null)
    {
        $this->where(['etat' => 0]);
        if ($sort) {
            $this->orderBy($sort);
        } else {
            $this->orderBy('date_ins');
        }

        return $this->paginate($perPage);
    }
}
