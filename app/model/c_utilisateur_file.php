<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_file extends Model
{
    // Table
    protected $table = 'c_utilisateur_file';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_file_type',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
