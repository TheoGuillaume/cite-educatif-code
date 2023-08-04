<?php

namespace App\Controllers;

use App\Models\c_utilisateur;

class C_utilisateurs extends BaseController
{
    public function index()
    {
        $model = new c_utilisateur();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateurs'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateurs/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur/create');
    }
    public function store()
    {
        $model = new c_utilisateur();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateurs');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur();
        $data['c_utilisateur'] = $model->find($id);
        return view('c_utilisateur/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateurs');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur();
        $model->delete($id);
    }
}
