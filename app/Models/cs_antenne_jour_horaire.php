<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_antenne_jour_horaire extends Model
{
    // Table
    protected $table = 'cs_antenne_jour_horaire';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur',
        'id_rang',
        'matin',
        'midi',
        'soir',
        'date_ins',
        'vacances',
        'etat',
    ];
}
