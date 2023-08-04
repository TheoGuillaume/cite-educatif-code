<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_particularite_action extends Model
{
    // Table
    protected $table = 'cs_particularite_action';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'nom',
        'desc_action',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
