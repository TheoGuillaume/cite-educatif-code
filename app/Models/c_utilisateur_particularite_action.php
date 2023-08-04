<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_particularite_action extends Model
{
    // Table
    protected $table = 'c_utilisateur_particularite_action';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur',
        'id_particularite_action',
        'date_ins',
        'etat'
    ];
    // Validation rules for id
    // protected $validationRules = [
    //     'id' => 'integer',
    // ];
}
