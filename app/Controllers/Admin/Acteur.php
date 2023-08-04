<?php

namespace App\Controllers\Admin;

class Acteur extends \App\Controllers\BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\ca_acteur();
    }
    public function index()
    {
        $perPage = $this->request->getVar('per_page') ?? 20;
        $sort = $this->request->getVar('sort');
        $acteurModel = new \App\Models\V_act_stru_user();
        $acteurs = $acteurModel->paginateacteur($perPage, $sort);
        //dd($result);
        return view(
            'admin/acteur/index',
            [
                'acteurs' => $acteurs,
                'pager' => $acteurModel->pager,
                'currentSort' => $sort,
                'perPage' => $perPage

            ]
        );
    }
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/acteur')->with('notification', ['success', 'Acteur supprimée.']);
    }
    private function getOr404($id)
    {
        $acteur = ($this->model->find($id));
        if ($acteur === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Acteur with id $id not found");
        }
        return $acteur;
    }

    public function edit($id)
    {
        $acteur = $this->getOr404($id);
        // dd($structure);
        // dd($acteur);
        return view('admin/acteur/edit', ['acteur' => $acteur]);
    }
    public function update($id)
    {
        $file = $this->request->getFile('photo_profil');

        //misy fichier ve
        if ($file->getSize() > 0) {
            //verifieo aloha
            $validationRule = [
                'photo_profil' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[photo_profil]',
                        'is_image[photo_profil]',
                        'mime_in[photo_profil,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                ],
            ];
            //raha tsy mety
            if (!$this->validate($validationRule)) {
                return redirect()->back()
                    ->with('errors', $this->validator->getErrors())
                    ->withInput();
            }

            $img = $this->request->getFile('photo_profil');
            //alefaso ilay fichier
            if (!$img->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('./upload', $newName);
                $post = $this->request->getPost();
                $post['photo_profil'] = $newName;
                //dd($post);

                if ($this->model->update($id, $post)) {
                    return redirect()->to("/admin/acteur")
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
                return redirect()->to("/admin/acteur")
                    ->with('notification', ['success', 'Modification est faite avec success']);
            } else {
                return redirect()->back()
                    ->with('errors', $this->model->errors())
                    ->withInput();
            }
        }
    }
}
