<?php

namespace App\Controllers;

use App\Models\c_utilisateur;
use App\Models\ca_acteur;
use App\Models\cs_struct;
use CodeIgniter\I18n\Time;

class SendEmailController extends BaseController
{
   
    public function generateToken($email) {
         // Set the timezone to Madagascar
        date_default_timezone_set('Indian/Antananarivo');
        $now = Time::now();
        $tokenData = $email . $now->toLocalizedString();
        $token = sha1($tokenData);;
        return $token;
    }

    public function updateDateTime(){
         // Set the timezone to Madagascar
        date_default_timezone_set('Indian/Antananarivo');
        $now = Time::now();
        $updatedDateTime = $now->addHours(1);
        return $updatedDateTime->toLocalizedString();
    }

    public function sendEmail($user_email){
        $userModel = new c_utilisateur();
        $message = "";
        $email = service('email');
        $email->setTo($user_email);
        $email->setSubject('Verification email, modification mot de passe');
        $token = $this->generateToken($user_email);
        $url = site_url("/inscription/showPassword/$token");
        $email->setMessage('<p>Veuillez cliquer : <a href='.$url.'>ce lien</a> pour accéder au page de modification de mot de passe.<p> ');
        if ($email->send()) { 
            $date_expire_token = $this->updateDateTime();
            $user_data = $userModel->where('email', $user_email)->first();
            $user_data['reset_token'] = $token;
            $user_data['token_expire'] =  $date_expire_token;
            unset($user_data['email']);
            $userModel->save($user_data);
            $message = "Email envoyer";
        } else {
            //echo $email->printDebugger();
            $message = "error";
            //$message = "Un problème est parvenu lors de l'envoyer de l'envoye de l'email, si le problème persiste, veuillez  créer un nouveau compte";
        };

        return $message;
    }

   

    public function sendEmailVerify(){

        $userModel = new c_utilisateur();
        $email = $this->request->getPost("email");
        $user = $userModel->where('email', $email)->first();

        if(!empty($user)){
            $sendEmail_message = $this->sendEmail($email);
            if($sendEmail_message == "error") {
                session()->setFlashdata("error_empty_email", "Un problème est parvenu lors de l'envoie de l'email, si le problème persiste, veuillez  créer un nouveau compte");
                return $this->response->redirect(site_url('/inscription/password'));
            }else{
                $session = session();
                $session->set('users', $user);
                $session->set('isLogined', true);
                echo view('static/nicko/header');
                echo view('/email/verify-mail');
                echo view('static/nicko/footer');
            }
        }else{
            session()->setFlashdata("error_empty_email", "Cet email n'existe pas");
            return $this->response->redirect(site_url('/inscription/password'));
        }
    }
 
}