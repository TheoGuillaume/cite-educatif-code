<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_territoire extends Model
{
    // Table
    protected $table = 'c_utilisateur_territoire';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_territoire',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
