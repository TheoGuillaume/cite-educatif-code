<?php

namespace App\Models;

use CodeIgniter\Model;

class c_utilisateur extends Model
{
    // Table
    protected $table = 'c_utilisateur';
    //protected $primaryKey = 'id';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur_categorie',
        'nom',
        'email',
        'mdp_1',
        'date_ins',
        'etat',
        'nombre_de_passages',
        'reset_token',
        'token_expire'
    ];
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[c_utilisateur.email]',
        'mdp_1' => 'required',
    ];
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
    public function findByCategorieEmailEtat($email, $categorie, $etat)
    {
        $array = ['email' => $email, 'id_utilisateur_categorie' => $categorie, 'etat' => $etat];
        return $this->where($array)->first();
    }
}
