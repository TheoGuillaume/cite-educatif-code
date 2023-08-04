<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_champ_action extends Model
{
    // Table
    protected $table = 'cs_champ_action';
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
