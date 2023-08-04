<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_signalement_probleme extends Model
{
    // Table
    protected $table = 'cs_signalement_probleme';
    // allowed fields to manage
    protected $allowedFields = ['id_struct', 'nom', 'commentaire'];
}
