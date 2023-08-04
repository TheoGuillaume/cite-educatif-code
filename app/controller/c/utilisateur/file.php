<?php
namespace App\Controllers;
use App\Models\c_utilisateur_file;
class C_utilisateur_files extends  BaseController
{
    public function index()
    {
        $model = new c_utilisateur_file();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_utilisateur_files'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_utilisateur_files/index', $data);
    }
    public function create()
    {
        return view('c_utilisateur_file/create');
    }
    public function store()
    {
        $model = new c_utilisateur_file();
        $model->save($this->request->getPost());
        return redirect()->to('/c_utilisateur_files');
    }
    public function edit($id = null)
    {
        $model = new c_utilisateur_file();
        $data['c_utilisateur_file'] = $model->find($id);
        return view('c_utilisateur_file/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_utilisateur_file();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_utilisateur_files');
    }
    public function delete($id = null)
    {
        $model = new c_utilisateur_file();
        $model->delete($id);
    }
}
