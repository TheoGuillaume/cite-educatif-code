<?php

namespace App\Controllers;

use App\Models\c_utilisateur;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        echo view('static/header');
        echo view('home');
        echo view('static/footer');
    }

    public function connexion()
    {

        $userModel = new c_utilisateur();

        $email = $this->request->getPost("email");
        $password = $this->request->getVar("mdp_1");

        $user = $userModel->where('email', $email)->first();

        if (!empty($user)) {
            if (password_verify($password, $user["mdp_1"])) {
                $session = session();
                $session->set('user', $user);
                return redirect()->to('/landingPage/landingPageTous');
            } else {
                session()->setFlashdata("error_password", "Mot de passe est incorrect ");
                return $this->response->redirect(site_url('/connexion'));
            }
        }
        echo view('static/header');
        echo view('connexion');
        echo view('static/footer');
    }

    public function logout()
    {
        // destroy session data
        session()->destroy();

        // redirect to login page
        return redirect()->to('/connexion');
    }
}
