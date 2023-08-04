<?php
namespace App\Models;
use CodeIgniter\Model;
class c_utilisateur_files extends Model
{
    // Table
    protected $table = 'c_utilisateur_files';
    // allowed fields to manage
    protected $allowedFields = [
        'id_utilisateur',
        'nom_file',
        'name_file',
        'etat'
    ];
  
}