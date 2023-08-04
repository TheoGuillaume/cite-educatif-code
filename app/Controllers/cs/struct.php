<?php
namespace App\Controllers;
use App\Models\cs_struct;
class Cs_structs extends  BaseController
{
    public function index()
    {
        $model = new cs_struct();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_structs'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_structs/index', $data);
    }
    public function create()
    {
        return view('cs_struct/create');
    }
    public function store()
    {
        $model = new cs_struct();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_structs');
    }
    public function edit($id = null)
    {
        $model = new cs_struct();
        $data['cs_struct'] = $model->find($id);
        return view('cs_struct/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_struct();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_structs');
    }
    public function delete($id = null)
    {
        $model = new cs_struct();
        $model->delete($id);
    }
}
