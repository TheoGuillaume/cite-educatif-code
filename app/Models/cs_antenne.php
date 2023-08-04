<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_antenne extends Model
{
    // Table
    protected $table = 'cs_antenne';
    // allowed fields to manage
   // allowed fields to manage
   protected $allowedFields = [
        'id_utilisateur',
        'adresse_principale',
        'email',
        'tel',
        'date_ins',
        'etat',
    ];
}
