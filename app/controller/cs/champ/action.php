<?php
namespace App\Controllers;
use App\Models\cs_champ_action;
class Cs_champ_actions extends  BaseController
{
    public function index()
    {
        $model = new cs_champ_action();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_champ_actions'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_champ_actions/index', $data);
    }
    public function create()
    {
        return view('cs_champ_action/create');
    }
    public function store()
    {
        $model = new cs_champ_action();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_champ_actions');
    }
    public function edit($id = null)
    {
        $model = new cs_champ_action();
        $data['cs_champ_action'] = $model->find($id);
        return view('cs_champ_action/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_champ_action();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_champ_actions');
    }
    public function delete($id = null)
    {
        $model = new cs_champ_action();
        $model->delete($id);
    }
}
