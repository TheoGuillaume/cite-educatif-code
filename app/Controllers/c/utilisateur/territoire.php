<?php
namespace App\Controllers;
use App\Models\c_utilisateur_territoire;
class C_utilisateur_territoires extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_territoire();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_territoires'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_territoires/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_territoire/create');
    }
    public function store()
    {
        $model = new c_utilisateur_territoire();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_territoires');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_territoire();
        $data['c_utilisateur_territoire'] = $model->find($id);
        return view('c_utilisateur_territoire/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_territoire();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_territoires');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_territoire();
        $model->delete($id);
    }
}
