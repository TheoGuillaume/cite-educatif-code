<?php
namespace App\Controllers;
use App\Models\cs_jour;
class Cs_jours extends  BaseController
{
    public function index()
    {
        $model = new cs_jour();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_jours'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_jours/index', $data);
    }
    public function create()
    {
        return view('cs_jour/create');
    }
    public function store()
    {
        $model = new cs_jour();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_jours');
    }
    public function edit($id = null)
    {
        $model = new cs_jour();
        $data['cs_jour'] = $model->find($id);
        return view('cs_jour/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_jour();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_jours');
    }
    public function delete($id = null)
    {
        $model = new cs_jour();
        $model->delete($id);
    }
}
