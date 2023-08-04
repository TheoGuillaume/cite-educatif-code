<?php

namespace App\Models;

use CodeIgniter\Model;

class ca_faq extends Model
{
    // Table
    protected $table = 'ca_faq';
    // allowed fields to manage
    protected $allowedFields = ['id_acteur', 'nom', 'mail', 'commentaire'];
}
