<?php
namespace App\Controllers;
use App\Models\c_file_type;
class C_file_types extends  BaseController
{
    public function index()
    {
        $model = new c_file_type();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['c_file_types'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('c_file_types/index', $data);
    }
    public function create()
    {
        return view('c_file_type/create');
    }
    public function store()
    {
        $model = new c_file_type();
        $model->save($this->request->getPost());
        return redirect()->to('/c_file_types');
    }
    public function edit($id = null)
    {
        $model = new c_file_type();
        $data['c_file_type'] = $model->find($id);
        return view('c_file_type/edit', $data);
    }
    public function update($id = null)
    {
        $model = new c_file_type();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/c_file_types');
    }
    public function delete($id = null)
    {
        $model = new c_file_type();
        $model->delete($id);
    }
}
