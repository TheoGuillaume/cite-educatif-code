<?php

namespace App\Libraries;

class Authentification
{
    private $user;

    public function login($email, $password)
    {
        $model = new \App\Models\c_utilisateur;
        $user = $model->findByCategorieEmailEtat($email, 1, 1);

        if ($user === null) {
            return false;
        }

        if (!password_verify($password, $user['mdp_1'])) {
            return false;
        }

        $session = session();
        $session->regenerate();
        $session->set('admin', $user);

        return true;
    }
    public function logout()
    {
        unset($_SESSION['admin']);
    }
    public function isLoggedIn()
    {
        return session()->has('admin');
    }
}
