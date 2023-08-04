<?php
namespace App\Controllers;
use App\Models\cs_thematique;
class Cs_thematiques extends  BaseController
{
    public function index()
    {
        $model = new cs_thematique();
        $filter = $this->request->getVar('filter');
        $page = $this->request->getVar('page') ?? 1;
        $data['cs_thematiques'] = $model->like($filter)->paginate(10, 'page', $page);
        $data['pager'] = $model->pager;
        return view('cs_thematiques/index', $data);
    }
    public function create()
    {
        return view('cs_thematique/create');
    }
    public function store()
    {
        $model = new cs_thematique();
        $model->save($this->request->getPost());
        return redirect()->to('/cs_thematiques');
    }
    public function edit($id = null)
    {
        $model = new cs_thematique();
        $data['cs_thematique'] = $model->find($id);
        return view('cs_thematique/edit', $data);
    }
    public function update($id = null)
    {
        $model = new cs_thematique();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/cs_thematiques');
    }
    public function delete($id = null)
    {
        $model = new cs_thematique();
        $model->delete($id);
    }
}
