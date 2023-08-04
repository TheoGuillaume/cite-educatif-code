<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_thematique extends Model
{
    // Table
    protected $table = 'c_utilisateur_thematique';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_thematique',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
