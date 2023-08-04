<?php

namespace App\Controllers\Admin;

use App\Entities\Actualite as EntitiesActualite;

class Actualite extends \App\Controllers\BaseController
{
    private $model;
    private $validation;

    public function __construct()
    {
        $this->model = new \App\Models\ActualiteModel;
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = $this->model->findAll();
        // dd($data);
        return view('admin/actualite/index', ['actus' => $data]);
    }
    public function new()
    {
        $actualite = new EntitiesActualite();
        //dd($actualite);
        return view('admin/actualite/new', ['actu' => $actualite]);
    }
    public function create()
    {
        $rules = [
            'img' => 'uploaded[img]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
        ];
        $img = $this->request->getFile('img');
        $brohure = $this->request->getFile('brochure');
        if ($this->validate($rules)) {
            $post = $this->request->getPost();
            if ($brohure !== null && $brohure->isValid() && !$brohure->hasMoved()) {
                $brohure->move('./uploads');
                $brohurename = $brohure->getName();
                $post['brochure'] = $brohurename;
            }
            if ($img->isValid() && !$img->hasMoved()) {
                $img->move('./upload');
                $imgname = $img->getName();
                $post['img'] = $imgname;
            }
            $actu = new EntitiesActualite($post);
            if ($this->model->insert($actu)) {
                return redirect()->to("/admin/actualite")
                    ->with('notification', ['success', 'Actualite ajouter avec success']);
            } else {
                return redirect()->back()
                    ->with('errors', $this->model->errors())
                    ->withInput();
            }
        } else {
            return redirect()->back()
                ->with('errors', $this->validation->getErrors())
                ->withInput();
        }
    }
    private function getOr404($id)
    {
        $actu = $this->model->getById($id);
        if ($actu === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Actu with id $id not found");
        }
        return $actu;
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/actualite')->with('notification', ['success', 'Actualite supprimée.']);
    }
    public function edit($id)
    {
        $actu = $this->getOr404($id);
        return view('admin/actualite/edit', ['actu' => $actu]);
    }
    public function update($id)
    {
        $actu = $this->getOr404($id);
        $img = $this->request->getFile('img');
        $brohure = $this->request->getFile('brochure');
        $post = $this->request->getPost();

        if ($brohure !== null && $brohure->isValid() && !$brohure->hasMoved()) {
            $brohure->move('./uploads');
            $brohurename = $brohure->getName();
            $post['brochure'] = $brohurename;
        }
        if ($img !== null && $img->isValid() && !$img->hasMoved()) {
            $img->move('./upload');
            $imgname = $img->getName();
            $post['img'] = $imgname;
        }

        $actu->fill($post);

        if (!$actu->hasChanged()) {
            return redirect()->to('/admin/actualite')->with('notification', ['info', 'Aucune modification faite']);
        }

        if ($this->model->save($actu)) {
            return redirect()->to('/admin/actualite')->with('notification', ['success', 'Modification faite avec success']);
        } else {
            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }
    }
}
