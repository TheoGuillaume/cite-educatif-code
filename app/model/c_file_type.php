<?php
namespace App\Models;
use CodeIgniter\Model;
class c_file_type extends Model
{
    // Table
    protected $table = 'c_file_type';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'file_type',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
