<?php
namespace App\Controllers;
use App\Models\c_utilisateur_public;
class C_utilisateur_publics extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_public();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_publics'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_publics/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_public/create');
    }
    public function store()
    {
        $model = new c_utilisateur_public();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_publics');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_public();
        $data['c_utilisateur_public'] = $model->find($id);
        return view('c_utilisateur_public/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_public();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_publics');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_public();
        $model->delete($id);
    }
}
