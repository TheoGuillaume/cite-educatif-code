<?php

namespace App\Models;

use CodeIgniter\Model;

class c_histo_adresse extends Model
{
    // Table
    protected $table = 'c_histo_adresse';
    // allowed fields to manage
    protected $allowedFields = ['id_entite', 'id_type_adresse', 'nom', 'detail','lat','lng'];
}
