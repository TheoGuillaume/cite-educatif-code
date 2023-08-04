<?php
namespace App\Models;
use CodeIgniter\Model;
class ca_acteur extends Model
{
    // Table
    protected $table = 'ca_acteur';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_structure',
        'nom',
        'prenom',
        'poste',
        'photo_profil',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
