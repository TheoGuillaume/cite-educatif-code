<?php
namespace App\Controllers;
use App\Models\cs_referent;
class Cs_referents extends  BaseController
{
    public function index()
    {
        $model = new cs_referent();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_referents'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_referents/index', $data);
    }
    public function create()
    {
        return view('cs_referent/create');
    }
    public function store()
    {
        $model = new cs_referent();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_referents');
    }
    public function edit($id = null)
    {
        $model = new cs_referent();
        $data['cs_referent'] = $model->find($id);
        return view('cs_referent/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_referent();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_referents');
    }
    public function delete($id = null)
    {
        $model = new cs_referent();
        $model->delete($id);
    }
}
