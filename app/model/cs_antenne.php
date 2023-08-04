<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_antenne extends Model
{
    // Table
    protected $table = 'cs_antenne';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'adresse_principale',
        'email',
        'tel',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
