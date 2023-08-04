<?php

namespace App\Models;

class PassageUserModel extends \CodeIgniter\Model
{
    protected $table = 'passage_utilisateur';

    protected $allowedFields = ['id_user', 'createAt'];

    protected $validationRules = [
        'id_user' => 'required',
        'createAt' => 'required'
    ];
}
