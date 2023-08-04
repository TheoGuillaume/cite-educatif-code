<?php

namespace App\Controllers;
use App\Models\cs_struct;
use App\Models\c_utilisateur;
use App\Models\c_utilisateur_modalite;
use App\Models\cs_modalite;
use App\Models\c_utilisateur_champ_action;
use App\Models\cs_champ_action;
use App\Models\c_utilisateur_particularite_action;
use App\Models\cs_particularite_action;
use App\Models\c_utilisateur_public;
use App\Models\cs_public;
use App\Models\c_utilisateur_territoire;
use App\Models\cs_territoire;
use App\Models\c_utilisateur_thematique;
use App\Models\ca_acteur;
use App\Models\cs_thematique;
use App\Models\cs_jour_horaire; 
use App\Models\c_utilisateur_files;
use App\Models\c_notification;
use App\Models\c_acteur_struct;

class Profil extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function fecthNbNotification($idUser, $categorie)
    {
        $c_notification = new c_notification();
        $val = "";
        if ($categorie == 2) {
            $val = $c_notification->selectCount('*', 'isa')->where('id_recepteur', $idUser)->where('lu', 0)->first();
        }
        if ($categorie == 3) {
            $db = \Config\Database::connect();
            $sql = "SELECT COUNT(*) as isa FROM v_demande_confimer_struct where v_demande_confimer_struct.id_recepteur =  '" . $idUser . "' and v_demande_confimer_struct.lu = 0";
            $query = $db->query($sql);
            $rep = $query->getResultArray();
            $val = $rep[0];
        }
        return $val;
    }

    public function profil()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $struct = new cs_struct();
        $acteur = new ca_acteur();
        $userModel = new c_utilisateur();
        $acteur_struct = new c_acteur_struct();
        $user = $this->session->get('user');

        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $user_data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);
     
        $acteur_session = $this->session->get('session_acteurs');
        $categorieUser = intval($user["id_utilisateur_categorie"]); 
        if($categorieUser == 2){
            $user_data['structs'] = $struct->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
            
              //get Modaliter utilisateur
            $cs_modalite = new cs_modalite();
            $user_data['modalites'] = $cs_modalite->join('c_utilisateur_modalite', 'c_utilisateur_modalite.id_modalite = cs_modalite.id')->where('c_utilisateur_modalite.id_utilisateur', intval($user["id"]))->findAll();

            //get champ action utilisateur
            $cs_champ_action = new cs_champ_action;
            $user_data['champ_actions'] = $cs_champ_action->join('c_utilisateur_champ_action', 'c_utilisateur_champ_action.id_champ_action = cs_champ_action.id')->where('c_utilisateur_champ_action.id_utilisateur', intval($user["id"]))->findAll();

            //get public utilisateur
            $cs_public = new cs_public();
            $user_data['publics'] = $cs_public->join('c_utilisateur_public', 'c_utilisateur_public.id_public = cs_public.id')->where('c_utilisateur_public.id_utilisateur', intval($user["id"]))->findAll();
            
            //get territoire utilsateur
            $cs_territoire = new cs_territoire();
            $user_data['territoires'] = $cs_territoire->join('c_utilisateur_territoire', 'c_utilisateur_territoire.id_territoire = cs_territoire.id')->where('c_utilisateur_territoire.id_utilisateur', intval($user["id"]))->findAll();

            //get thematique utilsateur
            $cs_thematique = new cs_thematique();
            $user_data['thematiques'] = $cs_thematique->join('c_utilisateur_thematique', 'c_utilisateur_thematique.id_thematique = cs_thematique.id')->where('c_utilisateur_thematique.id_utilisateur', intval($user["id"]))->findAll();
        
            //get cs_particularite_action utilisateur 
            $cs_particularite_action = new cs_particularite_action();
            $user_data['particularite_actions'] = $cs_particularite_action->join('c_utilisateur_particularite_action', 'c_utilisateur_particularite_action.id_particularite_action = cs_particularite_action.id')->where('c_utilisateur_particularite_action.id_utilisateur', intval($user["id"]))->findAll();
            
            //get jour hourraire
            $cs_jour_horaire = new cs_jour_horaire();
            $user_data['jour_horaires'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->findAll();

            $user_data['semaines'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '1')->first();
            $user_data['weekends'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '2')->first();
            $user_data['vacances'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '3')->first();

            //get Files 
            $c_utilisateur_files = new c_utilisateur_files();
            $user_data['files'] = $c_utilisateur_files->select('*')->where('c_utilisateur_files.id_utilisateur', intval($user["id"]))->where('c_utilisateur_files.etat', 1)->orderBy('c_utilisateur_files.date_ins', 'desc')->limit(3)->find();
            echo view('static/landingPage/header', $user_data);
            echo view('profil/profil_structure',  $user_data);
            echo view('static/landingPage/footer');
          

            // echo view('static/landingPage/header', $user_data);
            // echo view('profil/profil_structure', $user_data);
            // echo view('static/landingPage/footer');
        }

        if($categorieUser == 3){
            $user_data['acteurs']= $acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first(); 
            //  $user_data['structs'] = $struct->select('cs_struct.*')->join('ca_acteur', 'cs_struct.id = ca_acteur.id_structure')->where('ca_acteur.id_utilisateur', intval($user["id"]))->first();  
            $user_data['email_acteurs'] = $userModel->join('ca_acteur', 'c_utilisateur.id = ca_acteur.id_utilisateur')->where('c_utilisateur.id', $user['id'])->first();
             $user_data['acteur_structs'] = $acteur->select('ca_acteur.*, c_acteur_struct.id_struct, cs_struct.nom_social')
             ->join('c_acteur_struct', 'ca_acteur.id = c_acteur_struct.id_acteur')
             ->join('cs_struct', 'c_acteur_struct.id_struct = cs_struct.id')
             ->where('ca_acteur.id_utilisateur', $acteur_session['id_utilisateur'])->first();
        
            echo view('static/landingPage/header');
            echo view('profil/mon_profil_vue_acteur', $user_data);
            echo view('static/landingPage/footer');
        }

    }
 
    public function profilVueActeur()
    {   
        
        $user_isloginEd = $this->session->get('isLogined');
        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $struct = new cs_struct();
        $c_utilisateur = new c_utilisateur();

        $user = $this->session->get('user');
        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);
        //requetee view
        $utilisateur_struct = $c_utilisateur->join('cs_struct', 'cs_struct.id_utilisateur = c_utilisateur.id')->where('c_utilisateur.id', $user["id"])->first();
        $data["user"] = $utilisateur_struct;
        //requette view 
        echo view('static/landingPage/header', $data);
        echo view('profil/mon_profil_vue_acteur', $data);
        echo view('static/landingPage/footer');
    }

    //modifation photo profil
    public function modifiePhotoProfil(){
        $cs_struct = new cs_struct();
        $session = session();
        $photo_profil = $this->request->getFile('photo_profil');

        if($photo_profil->isValid() && !$photo_profil->hasMoved()){
            $file_logo_extension = $photo_profil->getExtension();
            if($file_logo_extension == "png" || $file_logo_extension == "jpg"){
                $fileSize = $photo_profil->getSize();
                $fileConversion =  $fileSize / 1000;
                //if($fileConversion <= 20 ){//
                    $user = $this->session->get('user');
                    $structure = $cs_struct->where('id_utilisateur', intval($user["id"]))->first();
                    $randomName = $photo_profil->getRandomName();
                    $structure['photo_logo'] = $randomName;
                    $photo_profil->move('./upload',$randomName);
                    $cs_struct->update($structure['id'], $structure);
                    $session->set('photo_logo', $randomName);
                    return $this->response->redirect(site_url('/profil'));
                //}//

                // if($fileConversion > 20){
                //     session()->setFlashdata("erreur_size_file", "Fichier trop lourd");
                //     return $this->response->redirect(site_url('/profil'));
                // }
            }else{
                session()->setFlashdata("erreur_extension", "Ficheir invalid , veuillez mettre un fichier de type png ou jpg");
                return $this->response->redirect(site_url('/profil'));
            }
        }
        // var_dump($photo_profil);
    }

    //Modification Profil
    public function profilModifierInformation()
    {
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_mes_informations');
        echo view('static/landingPage/footer');
    }
    public function profilModifierNumero(){
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_numero');
        echo view('static/landingPage/footer');

    }
    public function profilModifierNomPrenom()
    {
        $acteur = new ca_acteur();
        $user = $this->session->get('user');
        $data_acteur['acteurs']= $acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first(); 
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_nom_prenom', $data_acteur);
        echo view('static/footer');
    }
    public function profilModifierPoste()
    {
        $acteur = new ca_acteur();
        $user = $this->session->get('user');
        $data_acteur['acteurs']= $acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first(); 
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_poste',$data_acteur);
        echo view('static/footer');
    }
    public function profilModifierNomStructure()
    {
        $struct = new cs_struct();
        $acteur_session = $this->session->get('session_acteurs');
        // $struct_data['structs'] = $struct->where('cs_struct.id_utilisateur', intval($acteur_session["id_structure"]))->first();  
        $struct_data['structs'] = $struct->find();
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_nom_structure',$struct_data);
        echo view('static/footer');
    }
    public function profilModifierAdressMail()
    {
        $acteur = new ca_acteur();
        $userModel = new c_utilisateur();
        $user = $this->session->get('user');
        $data_acteur['acteurs'] = $userModel->join('ca_acteur', 'c_utilisateur.id = ca_acteur.id_utilisateur')->where('c_utilisateur.id', $user['id'])->first();
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_adress_mail', $data_acteur);
        echo view('static/footer');
    }
    public function profilModifierNumeroTel()
    {
        $acteur = new ca_acteur();
        $user = $this->session->get('user');
        $data_acteur['acteurs']= $acteur->where('ca_acteur.id_utilisateur', intval($user["id"]))->first(); 
        echo view('static/profil/header');
        echo view('profil/modifier/mon_profil_modifier_numero_tel', $data_acteur);
        echo view('static/footer');
    }
}