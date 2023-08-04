<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_public extends Model
{
    // Table
    protected $table = 'cs_public';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'nom',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
