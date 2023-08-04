<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_thematique extends Model
{
    // Table
    protected $table = 'cs_thematique';
    // allowed fields to manage
    protected $allowedFields = [
        'nom',
        'etat',
    ];
    // Validation rules for id
    // protected $validationRules = [
    //     'id' => 'integer',
    // ];
}
