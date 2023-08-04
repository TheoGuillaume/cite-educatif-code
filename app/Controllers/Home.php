<?php

namespace App\Controllers;

use App\Models\c_utilisateur;
use App\Models\ca_acteur;
use App\Models\cs_struct;
use App\Models\PassageUserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        echo view('static/nicko/header');
        echo view('home');
        echo view('static/nicko/footer');
    }

    public function connexion()
    {
        echo view('static/header');
        echo view('connexion');
        echo view('static/footer');
    }

    public function login()
    {
        $userModel = new c_utilisateur();
        $passageuser = new PassageUserModel();
        $cs_struct = new cs_struct();
        $ca_acteur = new ca_acteur();
        $email = $this->request->getPost("email");
        $password = $this->request->getVar("mdp_1");
        $user = $userModel->where('email', $email)->first();

        if (!empty($user)) {
            $session = session();
            if (password_verify($password, $user["mdp_1"])) {
                if ($user["id_utilisateur_categorie"] == 2) {
                    $userStruct = $cs_struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
                    if(empty($userStruct)){
                        session()->setFlashdata("error_password", "L'inscription de votre compte structure n'a pas encore été aboutie jusqu'à la fin, veuillez finir votre inscription");
                        return $this->response->redirect(site_url('/connexion'));
                    }else{
                        if($userStruct['etat'] == 0){
                            session()->setFlashdata("error_password", "
                            Le compte de votre structure est en cours de validation");
                            return $this->response->redirect(site_url('/connexion'));
                        }else{
                            if($userStruct['etat'] == 1){
                                if (!empty($userStruct['photo_logo'])) {
                                    $session->set('photo_logo', $userStruct['photo_logo']);
                                }
                            }
                        }
                    }
                }

                if ($user["id_utilisateur_categorie"] == 3) {
                    $acteur_session = $userModel->join('ca_acteur', 'c_utilisateur.id = ca_acteur.id_utilisateur')->where('c_utilisateur.email', $email)->first();
                    $session->set('session_acteurs', $acteur_session);
                    $ca_acteur = new ca_acteur;
                    $acteur_data = $ca_acteur->where('id_utilisateur', $user['id'])->first();
                    if(empty( $acteur_data)){
                        session()->setFlashdata("error_password", "L'inscription de votre compte acteur n'a pas encore été aboutie jusqu'à la fin, veuillez finir votre inscription");
                        return $this->response->redirect(site_url('/connexion'));
                    }else{
                        if($acteur_data['etat'] == 1){
                            if (!empty($acteur_session['photo_profil'])) {
                                $session->set('photo_profil', $acteur_session['photo_profil']);
                            }
                        }else{
                            session()->setFlashdata("error_password", "
                            Félicitations, vous avez terminé l’inscription. Vous pourrez vous connecter lorsque le référent de votre structure validera votre affiliation à sa structure.");
                            return $this->response->redirect(site_url('/connexion'));
                        }
                    }
                }

                if ($user["id_utilisateur_categorie"] == 1) {
                    session()->setFlashdata("error_password", "Mot de passe est incorrect ");
                    return $this->response->redirect(site_url('/connexion'));
                }

                $userModel->update($user['id'], ['nombre_de_passages' => $user['nombre_de_passages'] + 1]);

                $data = [
                    'id_user' => $user['id'],
                    'createAt' => date('Y-m-d')
                ];

                $passageuser->insert($data);
                $session->set('user', $user);
                $session->set('isLogined', true);
                return redirect()->to('/landingPage/landingPageTous');
            } else {
                session()->setFlashdata("error_password", "Mot de passe est incorrect ");
                return $this->response->redirect(site_url('/connexion'));
            }
        } else {
            session()->setFlashdata("error_empty", "Cet email n'existe pas");
            return $this->response->redirect(site_url('/connexion'));
        }
    }

    public function logout()
    {
        // destroy session data
        session()->destroy();

        // redirect to login page
        return redirect()->to('/connexion');
    }
}