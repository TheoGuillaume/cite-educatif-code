<?php

namespace App\Controllers;

use App\Models\cs_categorie;
use App\Models\cs_thematique;
use App\Models\cs_modalite;
use App\Models\cs_struct;
use App\Models\cs_champ_action;
use App\Models\cs_particularite_action;
use App\Models\cs_public;
use App\Models\c_utilisateur_files;
use App\Models\c_utilisateur_champ_action;
use App\Models\c_utilisateur_thematique;
use App\Models\c_utilisateur_public;
use App\Models\c_utilisateur_particularite_action;
use App\Models\c_utilisateur_modalite;
use App\Models\c_utilisateur_territoire;
use App\Models\cs_jour_horaire;
use App\Models\cs_referent;

class ModificationStructure extends BaseController
{
    //Modification description structure
    public function updateDescStrcucture()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $desc_mission = $this->request->getPost('desc_mission');
        if (!empty($desc_mission)) {
            $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
            $structure['desc_mission'] = $desc_mission;
            $cs_struct->update($structure['id'], $structure);
            return $this->response->redirect(site_url('/profil'));
        }
        session()->setFlashdata("erreur_desc", "Veuillez remplir le formulaire");
        return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsDescription'));
    }

    //Update adresse principale
    public function upadteAdressePrincipal()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $adresse_principale = $this->request->getPost('adresse_principale');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['adresse_principale'] = $adresse_principale;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //Update exemples actions
    public function updateExemplesAction()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $exemples_action = $this->request->getPost('exemples_action');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['exemples_action'] = $exemples_action;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }


    public function deleteDocument($id)
    {
        var_dump($id);
        $c_utilisateur_files = new c_utilisateur_files();
        $user = $this->session->get('user');
        $files = $c_utilisateur_files->where('id', $id)->first();
        //var_dump($files);
        $files['etat'] = 0;
        $c_utilisateur_files->update($files['id'], $files);
        return $this->response->redirect(site_url('/structure/modifier/structureModifierDocument'));
    }


    //Update Document
    public function updateDocument()
    {
        $c_utilisateur_files = new c_utilisateur_files();
        $user = $this->session->get('user');
        $uploadedFiles = $this->request->getFiles();
        if (count($uploadedFiles['fichier']) <= 3) {
            $valid = "";
            foreach ($uploadedFiles['fichier'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $nameFile = $file->getName();
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'nom_file' => $newName,
                            'name_file' => $nameFile
                        ]
                    );
                    $file->move('./uploads', $newName);
                    $c_utilisateur_files->insertBatch($data);
                    $valid = "ok";
                    //return $this->response->redirect(site_url('/profil'));
                } else {
                    session()->setFlashdata("erreur_filles", "Documents ou brochures obligatoires");
                    return $this->response->redirect(site_url('/structure/modifier/structureModifierDocument'));
                }
            }
            if(!empty($valid)){
                return $this->response->redirect(site_url('/profil'));
            }
        } else {
            session()->setFlashdata("erreur_filles", "Veuillez insérer 3 fichiers maximum");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierDocument'));
        }

    }

    //Update nom struucture
    public function updateNomstructure()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $nom_social = $this->request->getPost('nom_social');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['nom_social'] = $nom_social;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //Update categorie
    public function updateCategorie()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $id_categorie = $this->request->getPost('id_categorie');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['id_categorie'] = intval($id_categorie);
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //update email
    public function updateEmail()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $email_siege = $this->request->getPost('email_siege');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['email_siege'] = $email_siege;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //upadte numéro tel
    public function updateNumeroTel()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $tel_siege = $this->request->getPost('tel_siege');
        //var_dump($tel_siege);
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['tel_siege'] = $tel_siege;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //upadte site web
    public function updateSiteWeb()
    {
        $cs_struct = new cs_struct();
        $user = $this->session->get('user');
        $site_web = $this->request->getPost('site_web');
        $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
        $structure['site_web'] = $site_web;
        $cs_struct->update($structure['id'], $structure);
        return $this->response->redirect(site_url('/profil'));
    }

    //update referent 
    public function updateReferent()
    {
        $cs_referent = new cs_referent();
        $user = $this->session->get('user');
        $fonction = $this->request->getPost('fonction');
        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $email = $this->request->getPost('email');

        $referent = $cs_referent->where('id_utilisateur', intval($user["id"]))->first();

        if (empty($referent)) {
            $data = [
                'id_utilisateur' => intval($user["id"]),
                'fonction' => $fonction,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email
            ];

            $cs_referent->insert($data);
            return $this->response->redirect(site_url('/profil'));
        } else {
            $referent['fonction'] = $fonction;
            $referent['nom'] = $nom;
            $referent['prenom'] = $prenom;
            $referent['email'] = $email;
            $cs_referent->update($referent['id'], $referent);
            return $this->response->redirect(site_url('/profil'));
        }


    }

    //update Champs action
    public function updateChampAction()
    {
        $c_utilisateur_champ_action = new c_utilisateur_champ_action();
        $user = $this->session->get('user');
        $post_struct = $this->request->getPost('id_champ_action');
        if (!empty($post_struct)) {
            if (count($post_struct) > 3) {
                session()->setFlashdata("error_nb_action", "Maximun 3 champs");
                return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsActions'));
            }

            if ($c_utilisateur_champ_action->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($post_struct); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_champ_action' => intval($post_struct[$i])
                        ]
                    );
                    $c_utilisateur_champ_action->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_action", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsActions'));
        }
    }

    //Update thematique
    public function updateThematique()
    {
        $c_utilisateur_thematique = new c_utilisateur_thematique();
        $user = $this->session->get('user');
        $id_thematique = $this->request->getPost('id_thematique');
        if (!empty($id_thematique)) {
            if (count($id_thematique) > 3) {
                session()->setFlashdata("error_nb_thematique", "Maximun 3 champs");
                return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsThematique'));
            }

            if ($c_utilisateur_thematique->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($id_thematique); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_thematique' => intval($id_thematique[$i])
                        ]
                    );
                    $c_utilisateur_thematique->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_thematique", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsThematique'));
        }
    }

    //update public
    public function updatePublic()
    {
        $c_utilisateur_public = new c_utilisateur_public();
        $user = $this->session->get('user');
        $id_public = $this->request->getPost('id_public');
        if (!empty($id_public)) {
            if ($c_utilisateur_public->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($id_public); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_public' => intval($id_public[$i])
                        ]
                    );
                    $c_utilisateur_public->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_public", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsPublics'));
        }
    }

    //Update particularite action
    public function updateParticulariteAction()
    {
        $c_utilisateur_particularite_action = new c_utilisateur_particularite_action();
        $user = $this->session->get('user');
        $id_particularite_action = $this->request->getPost('id_particularite_action');
        if (!empty($id_particularite_action)) {
            // if(count($id_particularite_action) > 3){
            //     session()->setFlashdata("error_nb_thematique", "Maximun 3 champs");
            //     return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsThematique'));
            // }

            if ($c_utilisateur_particularite_action->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($id_particularite_action); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_particularite_action' => intval($id_particularite_action[$i])
                        ]
                    );
                    $c_utilisateur_particularite_action->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_particularite", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsParticulariterAction'));
        }
    }

    //update modalite informations
    public function updateModaliteInformations()
    {
        $c_utilisateur_modalite = new c_utilisateur_modalite();
        $user = $this->session->get('user');
        $id_modalite = $this->request->getPost('id_modalite');
        if (!empty($id_modalite)) {
            // if(count($id_modalite) > 3){
            //     session()->setFlashdata("error_nb_thematique", "Maximun 3 champs");
            //     return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsThematique'));
            // }

            if ($c_utilisateur_modalite->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($id_modalite); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_modalite' => intval($id_modalite[$i])
                        ]
                    );
                    $c_utilisateur_modalite->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_modalite", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsModalites'));
        }
    }

    //update territoires intervation
    public function updateTerritores()
    {
        $c_utilisateur_territoire = new c_utilisateur_territoire();
        $user = $this->session->get('user');
        $id_territoire = $this->request->getPost('id_territoire');
        if (!empty($id_territoire)) {
            // if(count($id_territoire) > 3){
            //     session()->setFlashdata("error_nb_thematique", "Maximun 3 champs");
            //     return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsThematique'));
            // }

            if ($c_utilisateur_territoire->where('id_utilisateur', intval($user["id"]))->delete()) {
                for ($i = 0; $i < count($id_territoire); $i++) {
                    $data = array(
                        [
                            'id_utilisateur' => intval($user["id"]),
                            'id_territoire' => intval($id_territoire[$i])
                        ]
                    );
                    $c_utilisateur_territoire->insertBatch($data);
                }
                return $this->response->redirect(site_url('/profil'));
            }
            ;


        } else {
            session()->setFlashdata("error_territoire", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierInformationsTerritoires'));
        }
    }

    //update jour horraire
    public function updateJourHorraire()
    {
        $cs_jour_horaire = new cs_jour_horaire();
        $user = $this->session->get('user');

        //Jour Horaire Semaine
        $post_horaire_semaine = [
            'id_utilisateur' => intval($user["id"]),
            'id_rang' => intval($this->request->getPost('semaine')),
            'matin' => $this->request->getPost('matin_semaine'),
            'midi' => $this->request->getPost('midi_semaine'),
            'soir' => $this->request->getPost('soir_semaine'),
        ];

        //Jour horaire wwekend
        $post_horaire_weekend = [
            'id_utilisateur' => intval($user["id"]),
            'id_rang' => intval($this->request->getPost('weekend')),
            'matin' => $this->request->getPost('matin_weekend'),
            'midi' => $this->request->getPost('midi_weekend'),
            'soir' => $this->request->getPost('soir_weekend'),
        ];

        //Jour Horaire weekend
        $post_horaire_vacance = [
            'id_utilisateur' => intval($user["id"]),
            'id_rang' => intval($this->request->getPost('vacance')),
            'matin' => $this->request->getPost('matin_vacance'),
            'midi' => $this->request->getPost('midi_vacance'),
            'soir' => $this->request->getPost('soir_vacance'),
        ];

        if ($post_horaire_semaine['id_rang'] != 0 || $post_horaire_weekend['id_rang'] != 0 || $post_horaire_vacance['id_rang'] != 0) {
            $veref = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->find();
            if (!empty($veref)) {
                $cs_jour_horaire->where('id_utilisateur', intval($user["id"]))->delete();
                $cs_jour_horaire->insert($post_horaire_semaine);
                $cs_jour_horaire->insert($post_horaire_weekend);
                $cs_jour_horaire->insert($post_horaire_vacance);
            } else {
                $cs_jour_horaire->insert($post_horaire_semaine);
                $cs_jour_horaire->insert($post_horaire_weekend);
                $cs_jour_horaire->insert($post_horaire_vacance);
            }
            return $this->response->redirect(site_url('/profil'));
        } else {
            session()->setFlashdata("error_message", "Veuillez choisir un jour horraire");
            return $this->response->redirect(site_url('/structure/modifier/structureModifierHeureOuverture'));
        }
    }

}