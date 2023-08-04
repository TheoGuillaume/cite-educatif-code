<?php

namespace App\Models;

use CodeIgniter\Model;

class c_file_histo extends Model
{
    // Table
    protected $table = 'c_file_histo';
    // allowed fields to manage
    protected $allowedFields = ['id_entite', 'id_file_type', 'nom'];
}
