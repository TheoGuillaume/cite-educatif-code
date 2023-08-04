<?php

namespace App\Controllers;

use App\Models\c_utilisateur;
use App\Models\cs_categorie;
use App\Models\cs_champ_action;
use App\Models\c_utilisateur_champ_action;
use App\Models\cs_thematique;
use App\Models\c_utilisateur_thematique;
use App\Models\cs_public;
use App\Models\c_utilisateur_public;
use App\Models\cs_particularite_action;
use App\Models\c_utilisateur_particularite_action;
use App\Models\cs_territoire;
use App\Models\c_utilisateur_territoire;
use App\Models\cs_modalite;
use App\Models\c_utilisateur_modalite;
use App\Models\ca_acteur;
use App\Models\cs_struct;
use App\Models\cs_jour_horaire;
use App\Models\c_utilisateur_files;
use App\Models\c_acteur_struct;
use App\Models\c_notification;
use App\Models\cs_antenne;
use App\Models\cs_antenne_jour_horaire;
use App\Models\cs_referent;
use CodeIgniter\I18n\Time;

class Inscription extends BaseController
{

    //Choix inscription en structure ou acteur
    public function choix()
    {
        echo view('static/header');
        echo view('inscription/choix');
        echo view('static/footer');
    }

    public function passwordReset()
    {
        echo view('static/header');
        echo view('inscription/password');
        echo view('static/footer');
    }



    public function changePassword()
    {
        $userModel = new c_utilisateur();
        $email = $this->request->getPost("email");
        $user = $userModel->where('email', $email)->first();
        if (!empty($user)) {
            $session = session();
            $session->set('users', $user);
            $session->set('isLogined', true);
            return redirect()->to('/inscription/showPassword');
        } else {
            session()->setFlashdata("error_empty_email", "Cet email n'existe pas");
            return $this->response->redirect(site_url('/inscription/password'));
        }
    }

    public function verificationToken($token)
    {
        // Set the timezone to Madagascar
        date_default_timezone_set('Indian/Antananarivo');
        $userModel = new c_utilisateur();
        $user_Token = $userModel->where('reset_token', $token)->first();
        if (!empty($user_Token)) {
            $now = Time::now();
            $date_now = $now->toLocalizedString();
            $token_expire = Time::createFromFormat('Y-m-d H:i:s', $user_Token["token_expire"]);
            if ($now < $token_expire) {
                echo view('static/header');
                echo view('inscription/showPassword');
                echo view('static/footer');
            } elseif ($now > $token_expire) {
                session()->setFlashdata("error_empty_email", "Le lien de réinitialisation est invalide ou a expiré. Veuillez demander un nouveau lien de réinitialisation.");
                return $this->response->redirect(site_url('/inscription/password'));
            } else {
                echo view('static/header');
                echo view('inscription/showPassword');
                echo view('static/footer');
            }
            // var_dump("exipre_date", $user_Token["token_expire"]);
            // if($user_Token["token_expire"] < $date_now)

        } else {
            session()->setFlashdata("error_empty_email", "Le lien de réinitialisation est invalide ou a expiré. Veuillez demander un nouveau lien de réinitialisation.");
            return $this->response->redirect(site_url('/inscription/password'));
        }
    }


    public function showPassword($token = null)
    {
        if (empty($token)) {
            session()->setFlashdata("error_empty_email", "Le lien de réinitialisation est invalide ou a expiré. Veuillez demander un nouveau lien de réinitialisation.");
            return $this->response->redirect(site_url('/inscription/password'));
        }
        $this->verificationToken($token);
    }
    public function updatePassword()
    {
        $userModel = new c_utilisateur();
        $new_password = $this->request->getVar('new_password');
        $confirmPassword = $this->request->getVar('confirm_password');
        $data = [
            'mdp_1' => password_hash($new_password, PASSWORD_DEFAULT),
        ];
        if ($new_password === $confirmPassword) {
            $users = $this->session->get('users');
            $user_data = $userModel->where('email', $users['email'])->first();
            $re = $userModel->update($user_data['id'], $data);
            $user_data = $userModel->where('email', $users['email'])->first();
            $user_data['reset_token'] = null;
            $user_data['token_expire'] = null;
            unset($user_data['email']);
            $userModel->save($user_data);
            return $this->response->redirect(site_url('connexion'));
        } else {
            session()->setFlashdata("error_update_password", "Les mots de passe saisis ne sont pas identiques");
            return redirect()->back()
                ->withInput();
        }
    }

    //Compte utilisateur: structure et acteur
    public function utilisateur()
    {
        if ($this->request->getPost('id_utilisateur_categorie') != null || $this->request->getPost('id_utilisateur_categorie') != "") {
            $this->session->set('id_utilisateur_categorie', $this->request->getPost('id_utilisateur_categorie'));
        }
        if ($this->session->get('id_utilisateur_categorie') == null) {
            session()->setFlashdata("error_entity_choix", "Sélectionnez votre type d'inscription...");
            return $this->response->redirect(site_url('/inscription/choix'));
        }
        echo view('static/header');
        echo view('inscription/utilisateur');
        echo view('static/footer');
    }

    public function saveUtilisateur()
    {
        /* Recuperation valeur depuis formulaire avec la methode post  */
        $user_check = new c_utilisateur();

        $post = [
            'nom' => 'User',
            'id_utilisateur_categorie' => intval($this->session->get('id_utilisateur_categorie')),
            'email' => $this->request->getVar('email'),
            'mdp_1' => password_hash($this->request->getVar('mdp_1'), PASSWORD_DEFAULT)
        ];

        //var_dump($post);

        $mdp = $this->request->getVar('mdp_1');
        $mdpConfirmation = $this->request->getVar('mdp_2');

        // $users = $user_check->asArray()->where('email', $post['email'])->findAll();
        // // /* Compte les resultats obtenus avec count et test s'il en existe deja */
        // if (count($users) > 0) {
        //     session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
        //     return $this->response->redirect(site_url('/inscription/utilisateur'));
        // }

        //verification si l'email existe

        $users = $user_check->where('email', $post['email'])->first();
        if ($users) {
            if ($users['id_utilisateur_categorie'] != $post['id_utilisateur_categorie']) {
                //update categorie compte utilisateur
                $verification_compte = "";
                if ($post['id_utilisateur_categorie'] == 2) {
                    $cs_struct = new cs_struct();
                    $data_user_struct = $cs_struct->where('id_utilisateur', $users['id'])->first();
                    if (empty($data_user_struct)) {
                        if ($mdp != $mdpConfirmation) {
                            session()->setFlashdata("error_password", "Mot de pass non identique");
                            return $this->response->redirect(site_url('/inscription/utilisateur'));
                        }
                        $users['mdp_1'] = $post['mdp_1'];
                        $users['id_utilisateur_categorie'] = $post['id_utilisateur_categorie'];
                        unset($users['email']);
                        $user_check->save($users);
                        $this->session->set('utilisateur_inscription', $users);
                        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
                    } else {
                        session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
                        return $this->response->redirect(site_url('/inscription/utilisateur'));
                    }
                }

                if ($post['id_utilisateur_categorie'] == 3) {
                    //var_dump('2');
                    $acteur = new ca_acteur();
                    $data_user_acteur = $acteur->where('id_utilisateur', $users['id'])->first();
                    if (empty($data_user_acteur)) {
                        // // /*  Verifier si les 2 mots de pass sont identiques  */
                        if ($mdp != $mdpConfirmation) {
                            session()->setFlashdata("error_password", "Mot de pass non identique");
                            return $this->response->redirect(site_url('/inscription/utilisateur'));
                        }
                        $users['mdp_1'] = $post['mdp_1'];
                        $users['id_utilisateur_categorie'] = $post['id_utilisateur_categorie'];
                        unset($users['email']);
                        $user_check->save($users);
                        $this->session->set('utilisateur_inscription', $users);
                        return $this->response->redirect(site_url('/inscription/acteur/inscriptionStructureActeurInfoProf'));
                    } else {
                        session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
                        return $this->response->redirect(site_url('/inscription/utilisateur'));
                    }
                }

            } else {
                //verification si le compte efa misy structure
                if ($users['id_utilisateur_categorie'] == 2) {
                    // var_dump('3');
                    $cs_struct = new cs_struct();
                    $data_user_struct = $cs_struct->where('id_utilisateur', $users['id'])->first();
                    if (empty($data_user_struct)) {
                        // // /*  Verifier si les 2 mots de pass sont identiques  */
                        if ($mdp != $mdpConfirmation) {
                            session()->setFlashdata("error_password", "Mot de pass non identique");
                            return $this->response->redirect(site_url('/inscription/utilisateur'));
                        }
                        $users['mdp_1'] = $post['mdp_1'];
                        unset($users['email']);
                        $user_check->save($users);
                        $this->session->set('utilisateur_inscription', $users);
                        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
                    } else {
                        session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
                        return $this->response->redirect(site_url('/inscription/utilisateur'));
                    }
                }

                if ($users['id_utilisateur_categorie'] == 3) {
                    //var_dump('4');
                    $acteur = new ca_acteur();
                    $data_user_acteur = $acteur->where('id_utilisateur', $users['id'])->first();
                    if (empty($data_user_acteur)) {
                        // // /*  Verifier si les 2 mots de pass sont identiques  */
                        if ($mdp != $mdpConfirmation) {
                            session()->setFlashdata("error_password", "Mot de pass non identique");
                            return $this->response->redirect(site_url('/inscription/utilisateur'));
                        }
                        $users['mdp_1'] = $post['mdp_1'];
                        unset($users['email']);
                        $user_check->save($users);
                        $this->session->set('utilisateur_inscription', $users);
                        return $this->response->redirect(site_url('/inscription/acteur/inscriptionStructureActeurInfoProf'));
                    } else {
                        session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
                        return $this->response->redirect(site_url('/inscription/utilisateur'));
                    }
                }
            }
        }
        // // /*  Verifier si les 2 mots de pass sont identiques  */
        if ($mdp != $mdpConfirmation) {

            session()->setFlashdata("error_password", "Mot de pass non identique");
            return $this->response->redirect(site_url('/inscription/utilisateur'));
        }

        $insertInsert = $user_check->insert($post);
        if (!empty($insertInsert)) {
            $utilisateur = $user_check->where('email', $post['email'])->first();
            // var_dump($utilisateur, "utilisateur");
            // var_dump($utilisateur['id'], "id_utilisateur");
            $this->session->set('utilisateur_inscription', $utilisateur);
            if ($post['id_utilisateur_categorie'] == 2) { // Structure
                return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
            } else {
                return $this->response->redirect(site_url('/inscription/acteur/inscriptionStructureActeurInfoProf'));
            }
        }

        // session()->setFlashdata("error_empty", "Un problème est survenu à notre base de donnée");
        // return $this->response->redirect(site_url('/inscription/utilisateur'));
    }

    //Bases
    public function inscriptionStructureZero()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_0');
        echo view('static/footer');
    }

    //save structre zero
    public function inscriptionStructureZeroSave()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');

        //Post structure
        $post_struct = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'nom_social' => $this->request->getPost('nom_social'),
            'sigle' => $this->request->getPost('sigle'),
            'siren' => $this->request->getPost('siren'),
            'adresse_siege' => $this->request->getPost('adresse_siege'),
            'adresse_principale' => $this->request->getPost('adresse_principal'),
            'tel_siege' => $this->request->getPost('tel_siege'),
            'email_siege' => $this->request->getPost('email_siege'),
            'desc_horaire_ouverture' => $this->request->getPost('desc_horaire_ouverture')
        ];

        //var_dump($post_struct, "Structure");

        //Jour Horaire Semaine
        $post_horaire_semaine = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('semaine')),
            'matin' => $this->request->getPost('matin_semaine'),
            'midi' => $this->request->getPost('midi_semaine'),
            'soir' => $this->request->getPost('soir_semaine'),
        ];
        var_dump($post_horaire_semaine, "semaine_horraire");

        //Jour Horaire weekend 
        $post_horaire_weekend = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('weekend')),
            'matin' => $this->request->getPost('matin_weekend'),
            'midi' => $this->request->getPost('midi_weekend'),
            'soir' => $this->request->getPost('soir_weekend'),
        ];
        //var_dump($post_horaire_weekend, "weekend_horraire");

        //Jour Horaire weekend
        $post_horaire_vacance = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('vacance')),
            'matin' => $this->request->getPost('matin_vacance'),
            'midi' => $this->request->getPost('midi_vacance'),
            'soir' => $this->request->getPost('soir_vacance'),
        ];
        //var_dump($post_horaire_vacance, "vacance_horraire");

        // if (empty($post_horaire_semaine['id_rang'])) {
        //     session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
        //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
        // }

        // if(empty($post_horaire_vacance['id_rang'])){
        //     session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
        //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
        // }

        // if(empty($post_horaire_weekend['id_rang'])){
        //     session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
        //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
        // }

        //Session Structure (semaine,weekend,vacance)Horraire
        $this->session->set('session_structure', $post_struct);
        $this->session->set('session_structure_horraire_semaine', $post_horaire_semaine);
        $this->session->set('session_structure_horraire_weekend', $post_horaire_weekend);
        $this->session->set('session_structure_horraire_vacance', $post_horaire_vacance);

        // var_dump($post_struct, "structure");
        // var_dump($post_horaire_semaine, "horraireSemaine");
        // var_dump($post_horaire_weekend, "post_horaire_weekend");
        // var_dump($post_horaire_vacance, "post_horaire_vacance");

        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureAntenneUn'));
    }

    public function inscriptionStructureAntenneUn()
    {
        // $session_structure = $this->session->get('session_structure');
        // var_dump($session_structure['nom_social']);
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_antenne_1');
        echo view('static/footer');
    }

    public function inscriptionStructureAntenneZero()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_antenne_0');
        echo view('static/footer');

        // $session_post_struct = $this->session->get('post_struct');
        // var_dump($session_post_struct);
    }

    //save antenne
    public function inscriptionStructureAntenneZeroSave()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');

        $post_antenne = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'adresse_principale' => $this->request->getPost('adresse_principale'),
            'email' => $this->request->getPost('email'),
            'tel' => $this->request->getPost('tel')
        ];

        //var_dump($post_antenne, 'post_antenne');
        //Jour Horaire Semaine
        $post_horaire_semaine = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('semaine')),
            'matin' => $this->request->getPost('matin_semaine'),
            'midi' => $this->request->getPost('midi_semaine'),
            'soir' => $this->request->getPost('soir_semaine'),
        ];
        // var_dump($post_horaire_semaine, "semaine_horraire");

        //Jour Horaire weekend 
        $post_horaire_weekend = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('weekend')),
            'matin' => $this->request->getPost('matin_weekend'),
            'midi' => $this->request->getPost('midi_weekend'),
            'soir' => $this->request->getPost('soir_weekend'),
        ];
        // var_dump($post_horaire_weekend, "weekend_horraire");

        //Jour Horaire weekend
        $post_horaire_vacance = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'id_rang' => intval($this->request->getPost('vacance')),
            'matin' => $this->request->getPost('matin_vacance'),
            'midi' => $this->request->getPost('midi_vacance'),
            'soir' => $this->request->getPost('soir_vacance'),
        ];
        //var_dump($post_horaire_vacance, "vacance_horraire");

        if (empty($post_horaire_semaine['id_rang'])) {
            session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureAntenneZero'));
        }

        // if(empty($post_horaire_vacance['id_rang'])){
        //     session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
        //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
        // }

        // if(empty($post_horaire_weekend['id_rang'])){
        //     session()->setFlashdata("error_empty_rang", "Veuillez préciser votre jour horraire");
        //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZero'));
        // }

        $this->session->set('session_antenne', $post_antenne);
        $this->session->set('session_antenne_horraire_semaine', $post_horaire_semaine);
        $this->session->set('session_antenne_horraire_weekend', $post_horaire_weekend);
        $this->session->set('session_antenne_horraire_vacance', $post_horaire_vacance);


        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureReferent'));
    }

    public function inscriptionStructureReferent()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_referent');
        echo view('static/footer');
    }

    //save Referent
    public function inscriptionStructureReferentSave()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_referent = [
            'id_utilisateur' => intval($session_utilisateur['id']),
            'fonction' => $this->request->getPost('fonction'),
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'email' => $this->request->getPost('email')
        ];
        //var_dump($post_referent, "referent");
        $this->session->set('session_referent', $post_referent);
        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureCategorieZero'));
    }


    public function inscriptionStructureCategorieZero()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_categorie = new cs_categorie();
        $data['cs_categories'] = $cs_categorie->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_categorie_0', $data);
        echo view('static/footer');
    }

    //save Categorie
    public function inscriptionStructureCategorieZeroSave()
    {

        $post_catg = intval($this->request->getPost('id_categorie'));

        //verifier si post_cat est vide
        if (empty($post_catg)) {
            session()->setFlashdata("error_categorie", "Auccun Catégorie sélectionner");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureCategorieZero'));
        }
        $this->session->set('session_categorie', $post_catg);
        return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureChampAction'));
    }


    // public function inscriptionStructureCategorieUn()
    // {
    //     echo view('static/header');
    //     echo view('inscription/structure/inscription_structure_categorie_1');
    //     echo view('static/footer');
    // }


    public function inscriptionStructureChampAction()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_champ_action = new cs_champ_action();
        $data['cs_champ_actions'] = $cs_champ_action->orderBy("nom", "asc")->where('etat =', 1)->find();
        // $session_post_categorie = $this->session->get('session_categorie');
        // var_dump($session_post_categorie);
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_champ_action', $data);
        echo view('static/footer');
    }

    //save champ Action
    public function inscriptionStructureChampActionSave()
    {
        $c_utilisateur_champ_action = new c_utilisateur_champ_action();
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_struct = $this->request->getPost('id_champ_action');
        $desc_mission = $this->request->getPost('desc_mission');

        if (!empty($post_struct)) {
            if (count($post_struct) > 3) {
                session()->setFlashdata("error_nb_action", "Attention, vous pouvez sélectionner 3 champs d'action");
                return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureChampAction'));
            }
            $val = [];
            for ($i = 0; $i < count($post_struct); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_champ_action' => intval($post_struct[$i])
                    ]
                );
                $val[$i] = $data;
                // var_dump($data);
                //$c_utilisateur_champ_action->insertBatch($data);

            }
            $this->session->set('session_champ_action', $val);
            $this->session->set('desc_mission', $desc_mission);
            //var_dump($desc_mission);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureThematique'));
        }

        if (empty($post_struct)) {
            session()->setFlashdata("error_action", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureChampAction'));
        }
    }

    public function inscriptionStructureThematique()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_thematique = new cs_thematique();
        $data['cs_thematiques'] = $cs_thematique->orderBy("nom", "asc")->where('etat =', 1)->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_thematique', $data);
        echo view('static/footer');
    }

    //save Thematique
    public function inscriptionStructureThematiqueSave()
    {
        $c_utilisateur_thematique = new c_utilisateur_thematique();
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_thematiques = $this->request->getPost('id_thematique');

        if (!empty($post_thematiques)) {
            if (count($post_thematiques) > 3) {
                session()->setFlashdata("error_nb_thematique", "Attention, vous pouvez sélectionner 3 thématiques éducatives");
                return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureThematique'));
            }
            $val = [];
            for ($i = 0; $i < count($post_thematiques); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_thematique' => intval($post_thematiques[$i])
                    ]
                );
                $val[$i] = $data;
                // var_dump($data);
                //$c_utilisateur_thematique->insertBatch($data);
            }
            $this->session->set('session_thematiques', $val);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructurePublic'));
        }

        if (empty($post_thematiques)) {
            session()->setFlashdata("error_thematique", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureThematique'));
        }
    }

    public function inscriptionStructurePublic()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_public = new cs_public();
        $data['cs_publics'] = $cs_public->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_public', $data);
        echo view('static/footer');
    }

    //Savr Publique
    public function inscriptionStructurePublicSave()
    {
        $c_utilisateur_public = new c_utilisateur_public();
        $post_publics = $this->request->getPost('id_public');
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (!empty($post_publics)) {
            $val = [];
            for ($i = 0; $i < count($post_publics); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_public' => $post_publics[$i]
                    ]
                );
                $val[$i] = $data;
                // var_dump($data);
                //$c_utilisateur_public->insertBatch($data);

            }
            $this->session->set('session_publics', $val);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureParticulariteAction'));
        }

        if (empty($post_publics)) {
            session()->setFlashdata("error_public", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructurePublic'));
        }
    }


    public function inscriptionStructureParticulariteAction()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_particularite_action = new cs_particularite_action();
        $data['cs_particularite_actions'] = $cs_particularite_action->orderBy("nom", "asc")->where('etat =', 1)->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_particularite_action', $data);
        echo view('static/footer');
    }

    //Save Particularite Action
    public function inscriptionStructureParticulariteActionSave()
    {
        $c_utilisateur_particularite_action = new c_utilisateur_particularite_action();
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_id_particularite_actions = $this->request->getPost('id_particularite_action');
        $exemples_action = $this->request->getPost('exemples_action');

        if (!empty($post_id_particularite_actions)) {
            // if (count($post_id_particularite_actions) > 3) {
            //     session()->setFlashdata("error_nb_action", "Attention, vous pouvez sélectionner 3 particularités de vos actions");
            //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureParticulariteAction'));
            // }
            $val = [];
            for ($i = 0; $i < count($post_id_particularite_actions); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_particularite_action' => intval($post_id_particularite_actions[$i])
                    ]
                );
                //var_dump($data);
                //$c_utilisateur_particularite_action->insertBatch($data);
                $val[$i] = $data;
            }
            $this->session->set('session_particularite_action', $val);
            $this->session->set('exemples_action', $exemples_action);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZone'));
        }

        if (empty($post_id_particularite_actions)) {
            session()->setFlashdata("error_particularite", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureParticulariteAction'));
        }
    }

    public function inscriptionStructureZone()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_territoire = new cs_territoire();
        $data['cs_territoires'] = $cs_territoire->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_zone', $data);
        echo view('static/footer');
    }

    //save Zone Territoire
    public function inscriptionStructureZoneSave()
    {
        $c_utilisateur_territoire = new c_utilisateur_territoire();
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_territoire = $this->request->getPost('id_territoire');
        if (!empty($post_territoire)) {
            $val = [];
            for ($i = 0; $i < count($post_territoire); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_territoire' => intval($post_territoire[$i])
                    ]
                );
                //var_dump($data);
                //$c_utilisateur_territoire->insertBatch($data);
                $val[$i] = $data;
            }
            $this->session->set('session_zone_territoire', $val);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureModalitePublic'));
        }

        if (empty($post_territoire)) {
            session()->setFlashdata("error_territoire", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureZone'));
        }
    }

    public function inscriptionStructureModalitePublic()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_modalite = new cs_modalite();
        $data['cs_modalites'] = $cs_modalite->where('etat =', 1)->find();
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_modalite_public', $data);
        echo view('static/footer');
    }

    //save modaliter
    public function inscriptionStructureModalitePublicSave()
    {
        $c_utilisateur_modalite = new c_utilisateur_modalite();
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        $post_modalites = $this->request->getPost('id_modalite');

        if (!empty($post_modalites)) {
            // if (count($post_modalites) > 3) {
            //     session()->setFlashdata("error_nb_modalite", "Attention, vous pouvez sélectionner 3 modalités d'intervention");
            //     return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureModalitePublic'));
            // }
            $val = [];
            for ($i = 0; $i < count($post_modalites); $i++) {
                $data = array(
                    [
                        'id_utilisateur' => intval($session_utilisateur['id']),
                        'id_modalite' => intval($post_modalites[$i])
                    ]
                );
                //var_dump($data);
                //$c_utilisateur_modalite->insertBatch($data);
                $val[$i] = $data;
            }
            $this->session->set('session_modalite_public', $val);
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureUploadFile'));
        }

        if (empty($post_modalites)) {
            session()->setFlashdata("error_modalite", "Veuillez sélectionner au moins 1 champ");
            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureModalitePublic'));
        }
    }

    public function inscriptionStructureUploadFile()
    {
        // $session_utilisateur = $this->session->get('utilisateur_inscription');
        // if (empty($session_utilisateur)) {
        //     return redirect()->to('/connexion');
        // }
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_upload_file');
        echo view('static/footer');
    }


    public function inscriptionStructureUploadFileSave()
    {
        $cs_struct = new cs_struct();
        $cs_jour_horaire = new cs_jour_horaire();
        $c_utilisateur_files = new c_utilisateur_files();
        $c_utilisateur_champ_action = new c_utilisateur_champ_action();
        $c_utilisateur_thematique = new c_utilisateur_thematique();
        $c_utilisateur_public = new c_utilisateur_public();
        $c_utilisateur_particularite_action = new c_utilisateur_particularite_action();
        $c_utilisateur_territoire = new c_utilisateur_territoire();
        $c_utilisateur_modalite = new c_utilisateur_modalite();
        $cs_antenne = new cs_antenne();
        $cs_antenne_jour_horaire = new cs_antenne_jour_horaire();
        $cs_referent = new cs_referent();
        $site_web = $this->request->getPost("site_web");

        //session utilisateur
        $session_utilisateur = $this->session->get('utilisateur_inscription');

        //getSession struct
        $session_structure = $this->session->get('session_structure');

        //getSession idCategorie
        $session_categorie = $this->session->get('session_categorie');

        //session horraire
        $session_struct_horraire_semaine = $this->session->get('session_antenne_horraire_semaine');
        $session_struct_horraire_weekend = $this->session->get('session_structure_horraire_weekend');
        $session_struct_horraire_vacance = $this->session->get('session_structure_horraire_vacance');

        //session desc_mission
        $session_desc_mission = $this->session->get('desc_mission');

        //session exemples action 
        $session_exemples_action = $this->session->get('exemples_action');

        //session champ_action
        $session_champ_action = $this->session->get('session_champ_action');
        //session thematiques
        $session_thematiques = $this->session->get('session_thematiques');
        //session public
        $session_publics = $this->session->get('session_publics');
        //session particularite action
        $session_particularite_action = $this->session->get('session_particularite_action');
        //session zone territoire
        $session_zone_territoire = $this->session->get('session_zone_territoire');
        //session modalité public
        $session_modalite_public = $this->session->get('session_modalite_public');

        //session antenne
        $session_antenne = $this->session->get('session_antenne');

        //session horaire antenne
        $session_antenne_horraire_semaine = $this->session->get('session_structure_horraire_semaine');
        $session_antenne_horraire_weekend = $this->session->get('session_antenne_horraire_weekend');
        $session_antenne_horraire_vacances = $this->session->get('session_antenne_horraire_vacance');

        //session referent
        $session_referent = $this->session->get('session_referent');

        $file_logo = $this->request->getFile('logo_structure');
        $uploadedFiles = $this->request->getFiles();

        //var_dump($session_structure);
        if (count($uploadedFiles['fichier']) <= 3) {
            if ($file_logo->isValid() && !$file_logo->hasMoved()) {
                $file_logo_extension = $file_logo->getExtension();
                $valid = "";
                $validChampAction = "";
                $validthematique = "";
                $validPublic = "";
                $validPartAction = "";
                $validZone = "";
                $validModPublic = "";
                $validFin = "";
                if ($file_logo_extension == "png" || $file_logo_extension == "jpg") {
                    $fileSize = $file_logo->getSize();
                    foreach ($uploadedFiles['fichier'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            if (count(array($file)) <= 3) {
                                $newName = $file->getRandomName();
                                $nameFile = $file->getName();
                                $data = array(
                                    [
                                        'id_utilisateur' => intval($session_utilisateur['id']),
                                        'nom_file' => $newName,
                                        'name_file' => $nameFile
                                    ]
                                );
                                $file->move('./uploads', $newName);
                                $c_utilisateur_files->insertBatch($data);
                                $valid = "ok";
                            } else {
                                session()->setFlashdata("erreur_filles", "Maximun 3");
                                return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureUploadFile'));
                            }
                        } else {
                            session()->setFlashdata("erreur_filles", "Documents ou brochures obligatoires");
                            return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureUploadFile'));
                        }
                    }
                    if (!empty($valid)) {
                        $insertStruct = $cs_struct->insert($session_structure);
                        if (!empty($insertStruct)) {
                            if (!empty($session_struct_horraire_semaine)) {
                                $cs_jour_horaire->insert($session_struct_horraire_semaine);
                            }
                            if (!empty($session_struct_horraire_weekend)) {
                                $cs_jour_horaire->insert($session_struct_horraire_weekend);
                            }
                            if (!empty($site_web)) {
                                $structure = $cs_struct->where('id_utilisateur', intval($session_utilisateur["id"]))->first();
                                $structure['site_web'] = $site_web;
                                $cs_struct->update($structure['id'], $structure);
                            }

                            if (!empty($session_struct_horraire_vacance)) {
                                $cs_jour_horaire->insert($session_struct_horraire_vacance);
                            }
                            //insert antenne
                            if (!empty($session_antenne)) {
                                $cs_antenne->insert($session_antenne);
                            }
                            //insert antenne jour horraire
                            if (!empty($session_antenne_horraire_semaine)) {
                                $cs_antenne_jour_horaire->insert($session_antenne_horraire_semaine);
                            }
                            if (!empty($session_antenne_horraire_weekend)) {
                                $cs_antenne_jour_horaire->insert($session_antenne_horraire_weekend);
                            }
                            if (!empty($session_antenne_horraire_vacances)) {
                                $cs_antenne_jour_horaire->insert($session_antenne_horraire_vacances);
                            }

                            //session referent
                            if (!empty($session_referent)) {
                                $cs_referent->insert($session_referent);
                            }

                            $randomName = $file_logo->getRandomName();
                            $id_utilisateur = $session_structure['id_utilisateur'];
                            $structure = $cs_struct->where('id_utilisateur', $id_utilisateur)->first();
                            $structure['id_categorie'] = $session_categorie;
                            $structure['photo_logo'] = $randomName;
                            $structure['desc_mission'] = $session_desc_mission;
                            $structure['exemples_action'] = $session_exemples_action;
                            $file_logo->move('./upload', $randomName);
                            $cs_struct->update($structure['id'], $structure);
                            $validChampAction = "ok";
                        }
                        if (!empty($validChampAction)) {
                            foreach ($session_champ_action as $champs_action) {
                                $c_utilisateur_champ_action->insertBatch($champs_action);
                                $validthematique = "ok";
                            }
                        }
                        if (!empty($validthematique)) {
                            foreach ($session_thematiques as $thematique) {
                                $c_utilisateur_thematique->insertBatch($thematique);
                                $validPublic = "ok";
                            }
                        }
                        if (!empty($validPublic)) {
                            foreach ($session_publics as $public) {
                                $c_utilisateur_public->insertBatch($public);
                                $validPartAction = "ok";
                            }
                        }
                        if (!empty($validPartAction)) {
                            foreach ($session_particularite_action as $partAction) {
                                $c_utilisateur_particularite_action->insertBatch($partAction);
                                $validZone = "ok";
                            }
                        }
                        if (!empty($validZone)) {
                            foreach ($session_zone_territoire as $territoire) {
                                $c_utilisateur_territoire->insertBatch($territoire);
                                $validModPublic = "ok";
                            }
                        }
                        if (!empty($validModPublic)) {
                            foreach ($session_modalite_public as $modalPublic) {
                                $c_utilisateur_modalite->insertBatch($modalPublic);
                                $validFin = "ok";
                            }
                        }
                        if (!empty($validFin)) {
                            session()->setFlashdata("info_inscritiption", "Le compte de votre structure est en cours de validation par l'administrateur.");
                            return $this->response->redirect(site_url('/connexion'));
                        }
                    }
                } else {
                    session()->setFlashdata("erreur_extension", "Fichier invalide , veuillez mettre un fichier de type png ou jpg");
                    return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureUploadFile'));
                }
            } else {
                session()->setFlashdata("erreur_extension", "Veuillez choisir une photo de profil");
                return $this->response->redirect(site_url('/inscription/structure/inscriptionStructureUploadFile'));
            }
        } else {
            session()->setFlashdata("erreur_extension", "Veuillez insérer 3 fichiers maximum");
        }

    }

    public function sessionLogin()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $session = session();
        $userModel = new c_utilisateur();
        $cs_struct = new cs_struct();
        $acteur = new ca_acteur();
        $user = $userModel->where('email', $session_utilisateur["email"])->first();
        $categorieUser = intval($user["id_utilisateur_categorie"]);
        if (!empty($user)) {
            if ($categorieUser == 2) {
                $userStruct = $cs_struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
                $session->set('photo_logo', $userStruct['photo_logo']);
            }
            if ($categorieUser == 3) {
                $userActeur = $acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first();
                $session->set('photo_profil', $userActeur['photo_profil']);
            }
            $session->set('user', $user);
            $session->set('isLogined', true);
            $session->remove('utilisateur_inscription');
            return redirect()->to('/landingPage/landingPageTous');
        }
    }

    public function inscriptionStructureActeurInfoProf()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');

        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }
        $cs_struct = new cs_struct();
        $data['structs'] = $cs_struct->where('etat', 1)->find();

        echo view('static/header');
        echo view('inscription/acteur/inscription_acteur_info_prof', $data);
        echo view('static/footer');
    }


    public function saveActeur()
    {
        $session_utilisateur = $this->session->get('utilisateur_inscription');
        if (empty($session_utilisateur)) {
            return redirect()->to('/connexion');
        }

        $acteur_User = new ca_acteur();
        $c_acteur_struct = new c_acteur_struct();
        $c_notification = new c_notification();
        $cs_struct = new cs_struct();


        $file_logo_acteurs = $this->request->getFile('logo_acteurs');
        $randomName = '';
        if ($file_logo_acteurs->isValid() && !$file_logo_acteurs->hasMoved()) {
            $file_logo_extension = $file_logo_acteurs->getExtension();
            if ($file_logo_extension == "png" || $file_logo_extension == "jpg") {
                $fileSize = $file_logo_acteurs->getSize();
                $randomName = $file_logo_acteurs->getRandomName();
                $file_logo_acteurs->move('./upload', $randomName);
            }
        }

        $acteurs_data = [
            'nom' => $this->request->getVar('nom'),
            'poste' => $this->request->getVar('poste'),
            'tel_acteur' => $this->request->getVar('tel_acteur'),
            'id_utilisateur' => intval($session_utilisateur['id']),
            'prenom' => $this->request->getVar('prenom'),
            'photo_profil' => $randomName
        ];

        if ($acteur_User->insert($acteurs_data)) {
            $findActeur = $acteur_User->where('id_utilisateur', $session_utilisateur['id'])->first();
            $acteur_struct = [
                'id_acteur' => $findActeur['id'],
                'id_struct' => intval($this->request->getVar('id_structure')),
            ];
            if ($c_acteur_struct->insert($acteur_struct)) {
                $findStruct = $cs_struct->where('id', intval($this->request->getVar('id_structure')))->first();
                $notification = [
                    'id_envoyeur' => $session_utilisateur['id'],
                    'id_recepteur' => $findStruct['id_utilisateur'],
                ];
                if ($c_notification->insert($notification)) {
                    $email = service('email');
                    $email_struct = "";
                    $cs_referent = new cs_referent();
                    $data_referent = $cs_referent->where('id_utilisateur', $findStruct['id_utilisateur'])->first();
                    if (empty($data_referent)) {
                        $utilisateur = new c_utilisateur();
                        $data_user_struct = $utilisateur->where('id', $findStruct['id_utilisateur'])->first();
                        $email_struct = $data_user_struct['email'];
                    } else {
                        $email_struct = $data_referent['email'];
                    }

                    $recipients = [$email_struct, 'direction.education.enfance@ville-argenteuil.fr ', 'cite.educative@ville-argenteuil.fr'];

                    foreach ($recipients as $recipient) {
                        $email->setTo($recipient);
                        $email->setSubject('Demande de confirmation compte acteur');
                        $email->setMessage('<p>Le compte acteur ' . $this->request->getVar('nom') . ' ' . $this->request->getVar('prenom') . ' demande une confirmation de son compte acteur.<p> ');
                        $email->send();
                    }
                    //$this->session->set('session_acteurs', $acteurs_data);
                    session()->setFlashdata("info_inscritiption", "Le compte de votre structure est en cours de validation par l'administrateur.");
                    return $this->response->redirect(site_url('/connexion'));
                }
                ;
            }
        }
    }

    public function inscriptionStructureFin()
    {
        echo view('static/header');
        echo view('inscription/structure/inscription_structure_fin');
        echo view('static/footer');
    }



    public function index()
    {
        return view('welcome_message');
    }
}