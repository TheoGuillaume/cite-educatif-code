<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_champ_action extends Model
{
    // Table
    protected $table = 'c_utilisateur_champ_action';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_champ_action',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
