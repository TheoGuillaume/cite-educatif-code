<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_modalite extends Model
{
    // Table
    protected $table = 'c_utilisateur_modalite';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur',
        'id_modalite',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    // protected $validationRules = [
    //     'id' => 'integer',
    // ];
}
