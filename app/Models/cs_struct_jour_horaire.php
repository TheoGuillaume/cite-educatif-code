<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_struct_jour_horaire extends Model
{
    // Table
    protected $table = 'cs_struct_jour_horaire';
    // allowed fields to manage
    protected $allowedFields = ['id_entite', 'id_horaire', 'id_jour', 'nom'];
}
