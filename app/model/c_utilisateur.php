<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur extends Model
{
    // Table
    protected $table = 'c_utilisateur';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur_categorie',
        'nom',
        'email',
        'mdp_1',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
