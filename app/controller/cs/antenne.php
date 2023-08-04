<?php
namespace App\Controllers;
use App\Models\cs_antenne;
class Cs_antennes extends  BaseController
{
    public function index()
    {
        $model = new cs_antenne();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_antennes'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_antennes/index', $data);
    }
    public function create()
    {
        return view('cs_antenne/create');
    }
    public function store()
    {
        $model = new cs_antenne();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_antennes');
    }
    public function edit($id = null)
    {
        $model = new cs_antenne();
        $data['cs_antenne'] = $model->find($id);
        return view('cs_antenne/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_antenne();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_antennes');
    }
    public function delete($id = null)
    {
        $model = new cs_antenne();
        $model->delete($id);
    }
}
