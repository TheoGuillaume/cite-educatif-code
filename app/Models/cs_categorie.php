<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_categorie extends Model
{
    // Table
    protected $table = 'cs_categorie';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'nom',
        'desc_cat,image_cat',
        'etat',
    ];
    // Validation rules for id
    // protected $validationRules = [
    //     'id' => 'integer',
    // ];
}
