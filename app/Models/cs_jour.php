<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_jour extends Model
{
    // Table
    protected $table = 'cs_jour';
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
