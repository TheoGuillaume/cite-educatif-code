<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_modalite extends Model
{
    // Table
    protected $table = 'cs_modalite';
    // allowed fields to manage
    protected $allowedFields = [
        'nom',
        'desc_modalite',
        'etat',
    ];
    // Validation rules for id
    // protected $validationRules = [
    //     'id' => 'integer',
    // ];
}
