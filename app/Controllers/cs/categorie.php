<?php
namespace App\Controllers;
use App\Models\cs_categorie;
class Cs_categories extends  BaseController
{
    public function index()
    {
        $model = new cs_categorie();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_categories'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_categories/index', $data);
    }
    public function create()
    {
        return view('cs_categorie/create');
    }
    public function store()
    {
        $model = new cs_categorie();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_categories');
    }
    public function edit($id = null)
    {
        $model = new cs_categorie();
        $data['cs_categorie'] = $model->find($id);
        return view('cs_categorie/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_categorie();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_categories');
    }
    public function delete($id = null)
    {
        $model = new cs_categorie();
        $model->delete($id);
    }
}
