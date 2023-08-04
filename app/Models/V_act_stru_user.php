<?php

namespace App\Models;

use CodeIgniter\Model;

class V_act_stru_user extends Model
{
    protected $table = 'v_act_struct_user';

    protected $returnType = 'App\Entities\V_act_struct_user';

    protected $allowedFields = ['id_acteur', 'id_struct', 'nom_social', 'photo_profil', 'id_utilisateur', 'nom', 'prenom', 'poste', 'etat', 'date_ins'];

    public function paginateacteur($perPage, $sort = null)
    {
        $this->where(['etat' => 1]);
        if ($sort) {
            $this->orderBy($sort);
        }
        return $this->paginate($perPage);
    }

    public function paginateacteurunactif($perPage, $sort = null)
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
