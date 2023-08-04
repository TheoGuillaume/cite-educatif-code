<?php

namespace App\Models;

use CodeIgniter\Model;

class v_passage_hebdo extends Model
{
    protected $table = 'passage_hebdo';

    protected $allowedFields = ['email', 'nombre_utilisateurs'];
}
