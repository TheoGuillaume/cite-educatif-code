<?php
namespace App\Controllers;
use App\Models\cs_public;
class Cs_publics extends  BaseController
{
    public function index()
    {
        $model = new cs_public();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_publics'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_publics/index', $data);
    }
    public function create()
    {
        return view('cs_public/create');
    }
    public function store()
    {
        $model = new cs_public();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_publics');
    }
    public function edit($id = null)
    {
        $model = new cs_public();
        $data['cs_public'] = $model->find($id);
        return view('cs_public/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_public();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_publics');
    }
    public function delete($id = null)
    {
        $model = new cs_public();
        $model->delete($id);
    }
}
