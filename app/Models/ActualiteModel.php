<?php

namespace App\Models;

class ActualiteModel extends \CodeIgniter\Model
{
    protected $table = 'actualite';

    protected $allowedFields = ['description', 'img', 'brochure', 'status'];

    protected $returnType = 'App\Entities\Actualite';

    protected $useTimestamps = true;

    protected $validationRules = [
        'description' => 'required'
    ];

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
    public function findByActif()
    {
        return $this->where('status', 1)->findAll();
    }
}
