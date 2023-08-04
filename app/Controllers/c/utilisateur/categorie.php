<?php
namespace App\Controllers;
use App\Models\c_utilisateur_categorie;
class C_utilisateur_categories extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_categorie();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_categories'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_categories/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_categorie/create');
    }
    public function store()
    {
        $model = new c_utilisateur_categorie();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_categories');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_categorie();
        $data['c_utilisateur_categorie'] = $model->find($id);
        return view('c_utilisateur_categorie/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_categorie();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_categories');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_categorie();
        $model->delete($id);
    }
}
