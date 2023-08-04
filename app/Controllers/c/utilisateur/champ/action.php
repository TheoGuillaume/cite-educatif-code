<?php
namespace App\Controllers;
use App\Models\c_utilisateur_champ_action;
class C_utilisateur_champ_actions extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_champ_action();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_champ_actions'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_champ_actions/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_champ_action/create');
    }
    public function store()
    {
        $model = new c_utilisateur_champ_action();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_champ_actions');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_champ_action();
        $data['c_utilisateur_champ_action'] = $model->find($id);
        return view('c_utilisateur_champ_action/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_champ_action();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_champ_actions');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_champ_action();
        $model->delete($id);
    }
}
