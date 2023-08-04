<?php

namespace App\Models;

use CodeIgniter\Model;

class cs_signalement_compte extends Model
{
    // Table
    protected $table = 'cs_signalement_compte';
    // allowed fields to manage
    protected $allowedFields = ['id_struct', 'id_signalement_compte_type', 'id_acteur', 'nom', 'commentaire'];
}
