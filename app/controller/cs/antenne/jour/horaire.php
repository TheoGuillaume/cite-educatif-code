<?php
namespace App\Controllers;
use App\Models\cs_antenne_jour_horaire;
class Cs_antenne_jour_horaires extends  BaseController
{
    public function index()
    {
        $model = new cs_antenne_jour_horaire();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_antenne_jour_horaires'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_antenne_jour_horaires/index', $data);
    }
    public function create()
    {
        return view('cs_antenne_jour_horaire/create');
    }
    public function store()
    {
        $model = new cs_antenne_jour_horaire();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_antenne_jour_horaires');
    }
    public function edit($id = null)
    {
        $model = new cs_antenne_jour_horaire();
        $data['cs_antenne_jour_horaire'] = $model->find($id);
        return view('cs_antenne_jour_horaire/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_antenne_jour_horaire();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_antenne_jour_horaires');
    }
    public function delete($id = null)
    {
        $model = new cs_antenne_jour_horaire();
        $model->delete($id);
    }
}
