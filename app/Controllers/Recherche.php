<?php

namespace App\Controllers;
use App\Models\cs_champ_action;
use App\Models\cs_thematique;
use App\Models\cs_public;
use App\Models\cs_territoire;
use App\Models\cs_modalite;
use App\Models\cs_particularite_action;
use App\Models\c_utilisateur_champ_action;
use App\Models\cs_struct;
use App\Models\c_utilisateur_territoire;
use App\Models\c_notification;

class Recherche extends BaseController
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

    public function affichePlus($table){
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM $table ORDER by id LIMIT 3, 18446744073709551615";
        $query = $db->query($sql);
        $val = $query->getResultArray();
        return $val;
    }

    public function rechercheFiltre()
    {
        $user = $this->session->get('user');
        $user_isloginEd = $this->session->get('isLogined');

        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);
        $db = \Config\Database::connect();

        $cs_champ_action= new cs_champ_action();
        $data['cs_champ_actions'] = $cs_champ_action->limit(3)->find();
        $data['champ_action_plus'] = $this->affichePlus("cs_champ_action");
       
        $cs_thematique= new cs_thematique();
        $data['cs_thematiques'] = $cs_thematique->limit(3)->find();
        $data['thematique_plus'] = $this->affichePlus("cs_thematique");

        $cs_public= new cs_public();
        $data['cs_publics'] = $cs_public->limit(3)->find();
        $data['public_plus'] = $this->affichePlus("cs_public");

        $cs_particularite_action = new cs_particularite_action();
        $data['cs_particularite_actions'] = $cs_particularite_action->limit(3)->find();
        $data['particulariter'] = $this->affichePlus("cs_particularite_action");

        $cs_territoire = new cs_territoire();
        $data['cs_territoires'] = $cs_territoire->limit(3)->find();
        $data['territoire_plus'] = $this->affichePlus("cs_territoire");

        $cs_modalite = new cs_modalite();
        $data['cs_modalites'] = $cs_modalite->limit(3)->find();
        $data['modaliter_plus'] = $this->affichePlus("cs_modalite");

        echo view('static/landingPage/header', $data);
        echo view('recherche/rechercheFiltre', $data);
        echo view('static/landingPage/footer');
    }

    public function rechercheResultat()
    {
        $user_isloginEd = $this->session->get('isLogined');

        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }
        $user = $this->session->get('user');
        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);

        $db = \Config\Database::connect();
        $recherche = $this->request->getPost('recherche');
        $post_champ_action = $this->request->getPost('id_champ_action');
        $post_thematiques = $this->request->getPost('id_thematique');
        $post_publics = $this->request->getPost('id_public');
        $post_particularite_actions = $this->request->getPost('id_particularite_action');
        $post_territoire = $this->request->getPost('id_territoire');
        $post_modaliter = $this->request->getPost('id_modalite');

        $stringchamp_action = "";
        if(!empty($post_champ_action)){
            $stringchamp_action = implode(',', $post_champ_action);
        }

        $stringthematique = "";
        if(!empty($post_thematiques)){
            $stringthematique = implode(',', $post_thematiques);
        }
      
        $stringpublic = "";
        if(!empty($post_publics)){
            $stringpublic = implode(',', $post_publics);
        }
      
        $stringpartaction = "";
        if(!empty($post_particularite_actions)){
            $stringpartaction = implode(',', $post_particularite_actions);
        }

        $stringterritoire = "";
        if(!empty($post_territoire)){
            $stringterritoire = implode(',', $post_territoire);
        }

        $stringmodaliter = "";
        if(!empty($post_modaliter)){
            $stringmodaliter = implode(',', $post_modaliter);
        }

        $sql = "";
        if(!empty($recherche)){
            $sql = "SELECT v_cs_struct_categorie.* FROM  v_cs_struct_categorie WHERE v_cs_struct_categorie.nom_social LIKE '%".$recherche."%'";
        } else{
            $sql = "SELECT v_cs_struct_categorie.* FROM  v_cs_struct_categorie JOIN c_utilisateur_champ_action on 
            v_cs_struct_categorie.id_utilisateur = c_utilisateur_champ_action.id_utilisateur join c_utilisateur_thematique on c_utilisateur_champ_action.id_utilisateur = c_utilisateur_thematique.id_utilisateur JOIN
            c_utilisateur_public on c_utilisateur_thematique.id_utilisateur = c_utilisateur_public.id_utilisateur JOIN
            c_utilisateur_territoire on c_utilisateur_public.id_utilisateur = c_utilisateur_territoire.id_utilisateur JOIN
            c_utilisateur_particularite_action on c_utilisateur_territoire.id_utilisateur = c_utilisateur_particularite_action.id_utilisateur JOIN
            c_utilisateur_modalite on  c_utilisateur_particularite_action.id_utilisateur = c_utilisateur_modalite.id_utilisateur 
            WHERE c_utilisateur_champ_action.id_champ_action IN ('".$stringchamp_action."') OR c_utilisateur_thematique.id_thematique IN ('".$stringthematique."') OR c_utilisateur_territoire.id_territoire 
            IN ('".$stringterritoire."') OR c_utilisateur_public.id_public IN ('".$stringpublic."') OR c_utilisateur_particularite_action.id_particularite_action IN ('".$stringpartaction."') OR c_utilisateur_modalite.id_modalite IN ('".$stringmodaliter."') GROUP  by v_cs_struct_categorie.id_utilisateur";
        }

        $query = $db->query($sql);
        $results = $query->getResultArray();
        $data['result_structs'] = $results;

        $cs_champ_action = new cs_champ_action();
        $data['champ_actions'] = $cs_champ_action->join('c_utilisateur_champ_action', 'cs_champ_action.id = c_utilisateur_champ_action.id_champ_action')->findAll();

        $cs_territoire = new cs_territoire();
        $data['territoires'] = $cs_territoire->
        join('c_utilisateur_territoire', 'cs_territoire.id = c_utilisateur_territoire.id_territoire')->
        findAll();

        $ter = new c_utilisateur_territoire();
        $data['territoires_all']=$ter
        ->select( 'c_utilisateur_territoire.id_territoire, COUNT(*) as isa')
        ->groupBy('c_utilisateur_territoire.id_utilisateur')
        ->findAll();

        echo view('static/landingPage/header', $data);
        echo view('recherche/recherche_resultat', $data);
        echo view('static/landingPage/footer');
    }   
}