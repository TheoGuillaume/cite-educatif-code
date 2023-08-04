<?php

namespace App\Controllers;
use App\Models\cs_struct;
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
use App\Models\cs_thematique;
use App\Models\cs_categorie;
use App\Models\cs_jour_horaire;
use App\Models\c_utilisateur_files;
use App\Models\c_notification;

class LandingPage extends BaseController
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

    public function akory(){
        $val = "akory";
        return $val;
    }

    public function findTerritoiresById($id_utilisateur){
        $ter = new c_utilisateur_territoire();
        $data = $ter->
        select('c_utilisateur_territoire.*, cs_territoire.nom')
        ->join('cs_territoire', 'c_utilisateur_territoire.id_territoire = cs_territoire.id')
        ->where('c_utilisateur_territoire.id_utilisateur', $id_utilisateur)
        ->groupBy('cs_territoire.nom')
        ->findAll();
        //var_dump($data);
       return $data;
        
    }

    public function isaTerritoires($id_utilisateur){
        $ter = new c_utilisateur_territoire();
        $data = $ter->
        select('c_utilisateur_territoire.*, cs_territoire.nom')
        ->join('cs_territoire', 'c_utilisateur_territoire.id_territoire = cs_territoire.id')
        ->where('c_utilisateur_territoire.id_utilisateur', $id_utilisateur)
        ->groupBy('cs_territoire.nom')
        ->findAll();
        $isa = count($data);
       return $isa;
    }

    public function countTerritoires(){
        $cs_territoire = new cs_territoire();
        $data = $cs_territoire->findAll();
        $val = count($data);
        return $val;
    }

    public function landingPageTous()
    {
        $user = $this->session->get('user');
        $user_isloginEd = $this->session->get('isLogined');

        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);
       
        $struct_data = new cs_struct();
        $data['structs'] = $struct_data->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.etat', '1')->orderBy('cs_struct.nom_social','ASC')->limit(20)->find();
        $sql= "SELECT * FROM cs_struct JOIN cs_categorie ON cs_categorie.id = cs_struct.id_categorie WHERE cs_struct.etat = '1' ORDER BY cs_struct.nom_social ASC LIMIT 20, 18446744073709551615";
        $query = $db->query($sql);
        $data['structs_plus'] = $query->getResultArray();
        $data['count_struct'] = count($data['structs']) + count($data['structs']); 
        //$res = $struct_data->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->find();
       
        //$id_utilisateur = $struct_data->select('id_utilisateur')->findAll();

        $cs_champ_action = new cs_champ_action();
        $data['champ_actions'] = $cs_champ_action->join('c_utilisateur_champ_action', 'cs_champ_action.id = c_utilisateur_champ_action.id_champ_action')->findAll();

        $cs_categorie = new cs_categorie();
        $data['cs_categories'] = $cs_categorie->find(); 

        echo view('static/landingPage/header', $data);
        echo view('landingPage/landing_page_tous', $data);
        echo view('static/landingPage/footer');
    }

    public function landingPageDetail($id)
    {
        $user = $this->session->get('user');
        $user_isloginEd = $this->session->get('isLogined');

        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $user_data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);
        
        //get Structure utilisateur
        $struct_data = new cs_struct();
        $user_data['structs'] = $struct_data->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.id_utilisateur', $id)->first(); 

        $id_utilisateur = intval($user_data['structs']["id_utilisateur"]);

        //get Modaliter utilisateur
        $cs_modalite = new cs_modalite();
        $user_data['modalites'] = $cs_modalite->join('c_utilisateur_modalite', 'c_utilisateur_modalite.id_modalite = cs_modalite.id')->where('c_utilisateur_modalite.id_utilisateur', $id_utilisateur)->findAll();

        //get champ action utilisateur
        $cs_champ_action = new cs_champ_action;
        $user_data['champ_actions'] = $cs_champ_action->join('c_utilisateur_champ_action', 'c_utilisateur_champ_action.id_champ_action = cs_champ_action.id')->where('c_utilisateur_champ_action.id_utilisateur', $id_utilisateur)->findAll();

        //get public utilisateur
        $cs_public = new cs_public();
        $user_data['publics'] = $cs_public->join('c_utilisateur_public', 'c_utilisateur_public.id_public = cs_public.id')->where('c_utilisateur_public.id_utilisateur', $id_utilisateur)->findAll();
        
        //get territoire utilsateur
        $cs_territoire = new cs_territoire();
        $user_data['territoires'] = $cs_territoire->join('c_utilisateur_territoire', 'c_utilisateur_territoire.id_territoire = cs_territoire.id')->where('c_utilisateur_territoire.id_utilisateur', $id_utilisateur)->groupBy('cs_territoire.nom')->findAll();

        //get thematique utilsateur
        $cs_thematique = new cs_thematique();
        $user_data['thematiques'] = $cs_thematique->join('c_utilisateur_thematique', 'c_utilisateur_thematique.id_thematique = cs_thematique.id')->where('c_utilisateur_thematique.id_utilisateur', $id_utilisateur)->findAll();
       
        //get cs_particularite_action utilisateur 
        $cs_particularite_action = new cs_particularite_action();
        $user_data['particularite_actions'] = $cs_particularite_action->join('c_utilisateur_particularite_action', 'c_utilisateur_particularite_action.id_particularite_action = cs_particularite_action.id')->where('c_utilisateur_particularite_action.id_utilisateur', $id_utilisateur)->groupBy('cs_particularite_action.nom')->findAll();
        
         //get jour hourraire
        $cs_jour_horaire = new cs_jour_horaire();
        $user_data['jour_horaires'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', $id_utilisateur)->findAll();

          //get Files 
          $c_utilisateur_files = new c_utilisateur_files();
          $user_data['files'] = $c_utilisateur_files->select('*')->where('c_utilisateur_files.id_utilisateur', $id_utilisateur)->orderBy('c_utilisateur_files.date_ins', 'desc')->limit(3)->find();

        echo view('static/landingPage/header', $user_data);
        echo view('landingPage/landing_page_detail', $user_data);
        echo view('static/landingPage/footer');
    }
    //$c_utilisateur->join('cs_struct', 'cs_struct.id_utilisateur = c_utilisateur.id')->where('c_utilisateur.id', $user["id"])->first();

    public function landindPageCategories()
    {
        echo view('static/landingPage/header');
        echo view('landingPage/landing_page_categories');
        echo view('static/landingPage/footer');
    }
    public function landindPageResulatCategories($id)
    {
        $user = $this->session->get('user');
        $user_isloginEd = $this->session->get('isLogined');

        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $categorieUser = intval($user["id_utilisateur_categorie"]);
        $data["notif"] = $this->fecthNbNotification(intval($user["id"]),$categorieUser);

        $struct_data = new cs_struct();
        $data['structs'] = $struct_data->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.id_categorie', $id)->find();

        $cs_champ_action = new cs_champ_action();
        $data['champ_actions'] = $cs_champ_action->join('c_utilisateur_champ_action', 'cs_champ_action.id = c_utilisateur_champ_action.id_champ_action')->findAll();

        $cs_territoire = new cs_territoire();
        $data['territoires'] = $cs_territoire->join('c_utilisateur_territoire', 'cs_territoire.id = c_utilisateur_territoire.id_territoire')->findAll();

        echo view('static/landingPage/header', $data);
        echo view('landingPage/landing_page_resultat_categories', $data);
        echo view('static/landingPage/footer');
    }

    //FaQ Page
    public function faQ()
    {
        echo view('static/header');
        echo view('faq');
        echo view('static/landingPage/footer');
    }
    
}