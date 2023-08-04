<?php

namespace App\Controllers\Admin;

use App\Models\cs_referent;

class Structure extends \App\Controllers\BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\cs_struct;
    }
    public function index()
    {
        $perPage = $this->request->getVar('per_page') ?? 20;
        $sort = $this->request->getVar('sort');
        $req = new \App\Models\v_cs_stru_user_cat;
        $result = $req->paginatestruct($perPage, $sort);
        //dd($result);
        return view('admin/structure/index', [
            'structures' => $result,
            'pager' => $req->pager,
            'currentSort' => $sort,
            'perPage' => $perPage
        ]);
    }
    private function getOr404($id)
    {
        $struct = $this->model->find($id);
        if ($struct === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Structure with id $id not found");
        }
        return $struct;
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/structure')->with('notification', ['success', 'Structure supprimée.']);
    }
    public function edit($id)
    {
        $struct = $this->getOr404($id);
        $categorie = new \App\Models\cs_categorie();
        $cat = $categorie->findAll();
        // dd($structure);
        // dd($acteur);
        return view('admin/structure/edit', ['structure' => $struct, 'categories' => $cat]);
    }
    public function update($id)
    {
        // dd($this->request->getPost());
        // exit();
        $file = $this->request->getFile('photo_logo');

        //misy fichier ve
        if ($file->getSize() > 0) {
            //verifieo aloha
            $validationRule = [
                'photo_logo' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[photo_logo]',
                        'is_image[photo_logo]',
                        'mime_in[photo_logo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                ],
            ];
            //raha tsy mety
            if (!$this->validate($validationRule)) {
                return redirect()->back()
                    ->with('errors', $this->validator->getErrors())
                    ->withInput();
            }

            $img = $this->request->getFile('photo_logo');
            //alefaso ilay fichier
            if (!$img->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('./upload', $newName);
                $post = $this->request->getPost();
                $post['photo_logo'] = $newName;
                //dd($post);

                if ($this->model->update($id, $post)) {
                    return redirect()->to("/admin/structure")
                        ->with('notification', ['success', 'Modification est faite avec success avec upload des fichiers']);
                } else {
                    return redirect()->back()
                        ->with('errors', $this->model->errors())
                        ->withInput();
                }
            }
            //efa ao ilay fichier
            return redirect()->back()
                ->with('errors', 'Le fichier est deja la')
                ->withInput();
        } else {
            //update sans fichier
            if ($this->model->update($id, $this->request->getPost())) {
                return redirect()->to("/admin/structure")
                    ->with('notification', ['success', 'Modification est faite avec success']);
            } else {
                return redirect()->back()
                    ->with('errors', $this->model->errors())
                    ->withInput();
            }
        }
    }

    public function detailReferentStructure($id)
    {
        $cs_referent = new cs_referent();
        $data['referent'] = $cs_referent->where('id_utilisateur', $id)->first();
        if ($data['referent'] !== null) {
            return $this->response->setJSON($data);
        } else {
            $data['error'] = "not found";
            unset($data['referent']);
            return $this->response->setJSON($data);
        }
    }
}
