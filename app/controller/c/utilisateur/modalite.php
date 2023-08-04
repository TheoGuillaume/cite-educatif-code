<?php
namespace App\Controllers;
use App\Models\c_utilisateur_modalite;
class C_utilisateur_modalites extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_modalite();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_modalites'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_modalites/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_modalite/create');
    }
    public function store()
    {
        $model = new c_utilisateur_modalite();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_modalites');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_modalite();
        $data['c_utilisateur_modalite'] = $model->find($id);
        return view('c_utilisateur_modalite/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_modalite();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_modalites');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_modalite();
        $model->delete($id);
    }
}
