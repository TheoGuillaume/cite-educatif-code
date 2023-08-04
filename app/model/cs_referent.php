<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_referent extends Model
{
    // Table
    protected $table = 'cs_referent';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'fonction',
        'nom',
        'prenom',
        'email',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
