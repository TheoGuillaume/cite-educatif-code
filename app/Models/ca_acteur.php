<?php

namespace App\Models;

use CodeIgniter\Model;

class ca_acteur extends Model
{
    // Table
    protected $table = 'ca_acteur';
    protected $primaryKey = 'id';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur',
        'nom',
        'prenom',
        'poste',
        'tel_acteur',
        'photo_profil',
        'date_ins',
        'etat',
    ];
}
