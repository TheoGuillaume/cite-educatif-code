<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_categorie extends Model
{
    // Table
    protected $table = 'c_utilisateur_categorie';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'nom',
        'rang', 
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
