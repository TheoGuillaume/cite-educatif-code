<?php

namespace App\Controllers;

use App\Models\c_acteur_struct;
use App\Models\c_notification;
use App\Models\c_utilisateur;
use App\Models\ca_acteur;
use App\Models\cs_struct;

class ModificationActeur extends BaseController
{
   public function updateNameActeur()
   {
      $cs_acteur = new ca_acteur();
      $user = $this->session->get('user');
      $name = $this->request->getPost('nom');
      $last_name = $this->request->getPost('prenom');
      $data_acteur = $cs_acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first();
      $data_acteur['nom'] = $name;
      $data_acteur['prenom'] = $last_name;

      $cs_acteur->update($data_acteur['id'], $data_acteur);
      // var_dump($cs_acteur);

      return $this->response->redirect(site_url('/profil'));
   }
   public function updatePhoneNumber()
   {
      $cs_acteur = new ca_acteur();
      $user = $this->session->get('user');
      $phone_number = $this->request->getPost('tel_acteur');
      $data_acteur = $cs_acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first();
      $data_acteur['tel_acteur'] = $phone_number;
      $cs_acteur->update($data_acteur['id'], $data_acteur);
      return $this->response->redirect(site_url('/profil'));
   }

   public function modifiePhotoProfilActeur()
   {
      $ca_acteur = new ca_acteur();
      $session = session();
      $photo_profil = $this->request->getFile('photo_profil');
      var_dump($photo_profil);

      if ($photo_profil->isValid() && !$photo_profil->hasMoved()) {
         $file_logo_extension = $photo_profil->getExtension();
         if ($file_logo_extension == "png" || $file_logo_extension == "jpg") {
            $fileSize = $photo_profil->getSize();
            $user = $this->session->get('user');
            $acteur = $ca_acteur->where('id_utilisateur', intval($user["id"]))->first();
            $randomName = $photo_profil->getRandomName();
            $acteur['photo_profil'] = $randomName;
            $photo_profil->move('./upload', $randomName);
            $ca_acteur->update($acteur['id'], $acteur);
            $session->set('photo_logo', $randomName);
            return $this->response->redirect(site_url('/profil'));
         } else {
            session()->setFlashdata("erreur_extension", "Ficheir invalid , veuillez mettre un fichier de type png ou jpg");
            return $this->response->redirect(site_url('/profil'));
         }
      }
   }

   public function updatPoste()
   {
      $cs_acteur = new ca_acteur();
      $user = $this->session->get('user');
      $poste = $this->request->getPost('poste');
      $data_acteur = $cs_acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first();
      $data_acteur['poste'] = $poste;
      $cs_acteur->update($data_acteur['id'], $data_acteur);
      return $this->response->redirect(site_url('/profil'));
   }
   public function updateEmailActeur()
   {
      $cs_acteur = new ca_acteur();
      $userModel = new c_utilisateur();
      $user = $this->session->get('user');
      $email = $this->request->getPost('email');
      $data_acteur = $userModel->join('ca_acteur', 'c_utilisateur.id = ca_acteur.id_utilisateur')->where('c_utilisateur.email', $user['email'])->first();
      $data_acteur['email'] =  $email;

      $users = $userModel->asArray()->where('email',  $data_acteur['email'])->findAll();
      // /* Compte les resultats obtenus avec count et test s'il en existe deja */
      if (count($users) > 0) {
         session()->setFlashdata("error_mail", "L'adresse mail existe déjà");
         return $this->response->redirect(site_url('/profil/modifier/profilModifierAdressMail'));
      }
      $userModel->update($user['id'], $data_acteur);
      return $this->response->redirect(site_url('/profil'));
   }

   public function updateNomStruct()
   {
      $cs_acteur = new ca_acteur();
      $c_notification = new c_notification();
      $acteur_struct = new c_acteur_struct();
      $cs_struct = new cs_struct();
      $acteur_session = $this->session->get('session_acteurs');
      $id_structure = intval($this->request->getVar('id_structure'));

      $data_acteur['acteur_structs'] = $cs_acteur->select('ca_acteur.*, c_acteur_struct.id_struct, cs_struct.nom_social')
         ->join('c_acteur_struct', 'ca_acteur.id = c_acteur_struct.id_acteur')
         ->join('cs_struct', 'c_acteur_struct.id_struct = cs_struct.id')
         ->where('ca_acteur.id_utilisateur', $acteur_session['id_utilisateur'])->first();

      $data_acteur['id_struct'] =  $id_structure;
      if ($acteur_struct->update($acteur_session['id'], $data_acteur)) {
         $findStruct = $cs_struct->where('id', intval($this->request->getVar('id_structure')))->first();
         $notification = [
            'id_envoyeur' => $acteur_session['id_utilisateur'],
            'id_recepteur' => $findStruct['id_utilisateur'],
         ];
         $c_notification->insert($notification);
         return $this->response->redirect(site_url('/profil'));
      }
     
   }
}
