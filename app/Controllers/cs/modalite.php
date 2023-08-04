<?php
namespace App\Controllers;
use App\Models\cs_modalite;
class Cs_modalites extends  BaseController
{
    public function index()
    {
        $model = new cs_modalite();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_modalites'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_modalites/index', $data);
    }
    public function create()
    {
        return view('cs_modalite/create');
    }
    public function store()
    {
        $model = new cs_modalite();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_modalites');
    }
    public function edit($id = null)
    {
        $model = new cs_modalite();
        $data['cs_modalite'] = $model->find($id);
        return view('cs_modalite/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_modalite();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_modalites');
    }
    public function delete($id = null)
    {
        $model = new cs_modalite();
        $model->delete($id);
    }
}
