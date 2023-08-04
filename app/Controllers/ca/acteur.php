<?php
namespace App\Controllers;
use App\Models\ca_acteur;
class Ca_acteurs extends  BaseController
{
    public function index()
    {
        $model = new ca_acteur();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['ca_acteurs'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('ca_acteurs/index', $data);
    }
    public function create()
    {
        return view('ca_acteur/create');
    }
    public function store()
    {
        $model = new ca_acteur();
        $model->save($this->request->getPost());
        return redirect()->to('/ca_acteurs');
    }
    public function edit($id = null)
    {
        $model = new ca_acteur();
        $data['ca_acteur'] = $model->find($id);
        return view('ca_acteur/edit', $data);
    }
    public function update($id = null)
    {
        $model = new ca_acteur();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/ca_acteurs');
    }
    public function delete($id = null)
    {
        $model = new ca_acteur();
        $model->delete($id);
    }
}
