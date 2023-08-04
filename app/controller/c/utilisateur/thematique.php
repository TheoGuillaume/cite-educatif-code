<?php
namespace App\Controllers;
use App\Models\c_utilisateur_thematique;
class C_utilisateur_thematiques extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_thematique();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_thematiques'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_thematiques/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_thematique/create');
    }
    public function store()
    {
        $model = new c_utilisateur_thematique();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_thematiques');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_thematique();
        $data['c_utilisateur_thematique'] = $model->find($id);
        return view('c_utilisateur_thematique/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_thematique();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_thematiques');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_thematique();
        $model->delete($id);
    }
}
