<?php

namespace App\Controllers\Admin;

class Login extends \App\Controllers\BaseController
{
    public function new()
    {
        return view('admin/login');
    }

    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $auth = new \App\Libraries\Authentification;

        if ($auth->login($email, $password)) {

            $redirect_url = session('redirect_url') ?? '/admin/structure';

            unset($_SESSION['redirect_url']);

            return redirect()->to($redirect_url);
        } else {
            return redirect()->back()->withInput()->with('warning', 'E-mail ou Mot de passe incorrect');
        };
    }
    public function delete()
    {
        $auth = new \App\Libraries\Authentification;
        $auth->logout();
        return redirect()->to('/admin/login');
    }
}
