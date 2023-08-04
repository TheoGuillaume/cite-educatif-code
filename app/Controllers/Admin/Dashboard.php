<?php

namespace App\Controllers\Admin;

use App\Models\v_passage_hebdo;

class Dashboard extends \App\Controllers\BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $passage_hebdo = new v_passage_hebdo();
        $nbr_struct = $this->db->table('cs_struct')->countAllResults();
        $nbr_act = $this->db->table('ca_acteur')->countAllResults();
        $passage_quotidien = $this->db->table('passage_quotidien')->get()->getResult();
        //dd($passage_quotidien);
        $struct_cat = $this->db->table('structure_categorie')->get()->getResult();
        $passage_hebdo->orderBy('nombre_utilisateurs', 'DESC');

        return view('admin/dashboard', [
            'nbr_struct' => $nbr_struct,
            'nbr_act' => $nbr_act,
            'passage_quotidien' => $passage_quotidien,
            'struct_cat' => $struct_cat,
            'passage_hebdos' => $passage_hebdo->findAll()
        ]);
    }
}
