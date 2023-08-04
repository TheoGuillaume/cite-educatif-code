<?php
namespace App\Controllers;
use App\Models\cs_territoire;
class Cs_territoires extends  BaseController
{
    public function index()
    {
        $model = new cs_territoire();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_territoires'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_territoires/index', $data);
    }
    public function create()
    {
        return view('cs_territoire/create');
    }
    public function store()
    {
        $model = new cs_territoire();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_territoires');
    }
    public function edit($id = null)
    {
        $model = new cs_territoire();
        $data['cs_territoire'] = $model->find($id);
        return view('cs_territoire/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_territoire();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_territoires');
    }
    public function delete($id = null)
    {
        $model = new cs_territoire();
        $model->delete($id);
    }
}
