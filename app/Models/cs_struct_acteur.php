<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_struct_acteur extends Model
{
    // Table
    protected $table = 'cs_struct_acteur';
    // allowed fields to manage
    protected $allowedFields = ['id_struct', 'id_acteur', 'nom'];
}
