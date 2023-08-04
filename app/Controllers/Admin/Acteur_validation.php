<?php

namespace App\Controllers\Admin;

class Acteur_validation extends \App\Controllers\BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\ca_acteur();
    }
    public function index()
    {
        $perPage = $this->request->getVar('per_page') ?? 20;
        $sort = $this->request->getVar('sort');
        $acteurModel = new \App\Models\V_act_stru_user();
        $acteurs = $acteurModel->paginateacteurunactif($perPage, $sort);
        return view('admin/validation/acteurvalidation', [
            'acteurs' => $acteurs,
            'pager' => $acteurModel->pager,
            'currentSort' => $sort,
            'perPage' => $perPage
        ]);
    }
    public function activateuser($id)
    {
        $data = [
            'etat' => 1,
            'id' => $id
        ];
        $this->model->save($data);
        return redirect()->to("/admin/acteur_validation")
            ->with('notification', ['success', 'Compte Acteur valider avec success']);
    }
}
