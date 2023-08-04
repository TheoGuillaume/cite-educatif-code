<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_public extends Model
{
    // Table
    protected $table = 'c_utilisateur_public';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_public',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
