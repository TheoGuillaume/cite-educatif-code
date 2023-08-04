<?php
namespace App\Models;
use CodeIgniter\Model;
class c_acteur_struct extends Model
{
    // Table
    protected $table = 'c_acteur_struct';
    // allowed fields to manage
    protected $allowedFields = [
        'id_acteur',
        'id_struct',
        'date_ins',
        'etat',
    ];
}
