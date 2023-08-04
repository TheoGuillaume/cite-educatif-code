<?php

namespace App\Controllers\Admin;

class Structure_validation extends \App\Controllers\BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\cs_struct;
    }
    public function index()
    {
        $perPage = $this->request->getVar('per_page') ?? 20;
        $sort = $this->request->getVar('sort');
        $req = new \App\Models\v_cs_stru_user_cat;
        $result = $req->paginatestructunactif($perPage, $sort);
        //dd($result);
        return view('admin/validation/structurevalidation', [
            'structures' => $result,
            'pager' => $req->pager,
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
        return redirect()->to("/admin/structure_validation")
            ->with('notification', ['success', 'Compte Structure valider avec success']);
    }
}
