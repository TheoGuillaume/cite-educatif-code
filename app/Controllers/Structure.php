<?php

namespace App\Controllers;

use App\Models\cs_categorie;
use App\Models\cs_thematique;
use App\Models\cs_modalite;
use App\Models\cs_champ_action;
use App\Models\cs_particularite_action;
use App\Models\cs_public;
use App\Models\cs_struct;
use App\Models\c_utilisateur_champ_action;
use App\Models\c_utilisateur_thematique;
use App\Models\c_utilisateur_public;
use App\Models\c_utilisateur_particularite_action;
use App\Models\c_utilisateur_modalite;
use App\Models\cs_territoire;
use App\Models\c_utilisateur_territoire;
use App\Models\cs_jour_horaire;
use App\Models\cs_referent;
use App\Models\c_utilisateur_files;

class Structure extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function structureVueVisiteur()
    {
        echo view('static/header');
        echo view('structure/page_structure_vue_visiteur');
        echo view('static/landingPage/footer');
    }
    public function structureVueVisiteurSignalement()
    {
        echo view('static/header');
        echo view('structure/page_structure_vue_visiteur_signalement');
        echo view('static/landingPage/footer');
    }

    //Ma structure modifier informations
    public function structureModifierInformationsNom()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $user = $this->session->get('user');
        $cs_struct = new cs_struct();
        $user_data['structs'] = $cs_struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_nom', $user_data);
    }
    public function structureModifierInformations()
    {
        echo view('static/profil/header');
        echo view('structure/modifier/ma_structure_modifier_informations');
        echo view('static/structure/footer');
    }
    public function structureModifierInformationsCategorie()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $user = $this->session->get('user');

        $cs_categorie = new cs_categorie();
        $data['cs_categories'] = $cs_categorie->find();

        $cs_struct = new cs_struct();
        $data['id_categories'] = $cs_struct->select('id_categorie')->where('cs_struct.id_utilisateur', intval($user["id"]))->first();

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_categorie', $data);
    }
    public function structureModifierInformationsAdressePrincipal()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        $user = $this->session->get('user');
        $user_data['structs'] = $struct->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_adresse_principal', $user_data);
    }
    public function structureModifierInformationsEmail()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        $user = $this->session->get('user');
        $user_data['structs'] = $struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_email', $user_data);
    }
    public function structureModifierInformationsNumero()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        $user = $this->session->get('user');
        $user_data['structs'] = $struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_numero', $user_data);
        echo view('static/footer');
    }
    public function structureModifierSiteWeb()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        $user = $this->session->get('user');
        $user_data['structs'] = $struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_site_web', $user_data);
        echo view('static/footer');
    }

    public function structureModifierExemplesAction()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        //$c_utilisateur = new c_utilisateur();
        $user = $this->session->get('user');
        $user_data['structs'] = $struct->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_exemples_action', $user_data);
        echo view('static/footer');
    }
    public function structureModifierInformationsActions()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $cs_champ_action = new cs_champ_action();
        $c_utilisateur_champ_action = new c_utilisateur_champ_action();
        $data1 = $cs_champ_action->where('etat =', 1)->find();
        $data2 = $c_utilisateur_champ_action->join('cs_champ_action', 'c_utilisateur_champ_action.id_champ_action = cs_champ_action.id')->where('c_utilisateur_champ_action.id_utilisateur', intval($user["id"]))->findAll();
        $query = $db->query("SELECT * FROM cs_champ_action WHERE cs_champ_action.id  not IN (SELECT c_utilisateur_champ_action.id_champ_action from c_utilisateur_champ_action where c_utilisateur_champ_action.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();

        $commun_element = [];
        $diff_element = [];

        foreach ($data1 as $allchampsAction) {
            foreach ($data2 as $champsActionUser) {
                if ($allchampsAction['id'] == $champsActionUser['id_champ_action']) {
                    $commun_element[] = ([
                        "id" => $allchampsAction['id'],
                        "nom" => $allchampsAction['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);
        $data['listes'] = $liste;


        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_actions', $data);
    }
    public function structureModifierInformationsThematique()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $cs_thematique = new cs_thematique();
        $c_utilisateur_thematique = new c_utilisateur_thematique();
        $data1 = $cs_thematique->where('etat =', 1)->find();
        $data2 = $c_utilisateur_thematique->where('c_utilisateur_thematique.id_utilisateur', intval($user["id"]))->find();
        $query = $db->query("SELECT * FROM cs_thematique WHERE cs_thematique.id  not IN (SELECT c_utilisateur_thematique.id_thematique from c_utilisateur_thematique where c_utilisateur_thematique.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();
        $commun_element = [];
        $diff_element = [];
        foreach ($data1 as $allThematique) {
            foreach ($data2 as $thematiqueUser) {
                if ($allThematique['id'] == $thematiqueUser['id_thematique']) {
                    $commun_element[] = ([
                        "id" => $allThematique['id'],
                        "nom" => $allThematique['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);

        $data['cs_thematiques'] = $liste;

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_thematique', $data);
    }
    public function structureModifierInformationsPublics()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $cs_public = new cs_public();
        $c_utilisateur_public = new c_utilisateur_public();
        $data1 = $cs_public->find();
        $data2 = $c_utilisateur_public->where('c_utilisateur_public.id_utilisateur', intval($user["id"]))->find();
        $query = $db->query("SELECT * FROM cs_public WHERE cs_public.id  not IN (SELECT c_utilisateur_public.id_public from c_utilisateur_public where c_utilisateur_public.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();
        $commun_element = [];
        $diff_element = [];
        foreach ($data1 as $allPublics) {
            foreach ($data2 as $publicUser) {
                if ($allPublics['id'] == $publicUser['id_public']) {
                    $commun_element[] = ([
                        "id" => $allPublics['id'],
                        "nom" => $allPublics['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);

        $data['cs_publics'] = $liste;

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_publics', $data);
    }
    public function structureModifierInformationsParticulariterAction()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $c_utilisateur_particularite_action = new c_utilisateur_particularite_action();
        $cs_particularite_action = new cs_particularite_action();
        $data1 = $cs_particularite_action->where('etat =', 1)->find();
        $data2 = $c_utilisateur_particularite_action->where('c_utilisateur_particularite_action.id_utilisateur', intval($user["id"]))->find();
        $query = $db->query("SELECT * FROM cs_particularite_action WHERE cs_particularite_action.id  not IN (SELECT c_utilisateur_particularite_action.id_particularite_action from c_utilisateur_particularite_action where c_utilisateur_particularite_action.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();
        $commun_element = [];
        $diff_element = [];
        foreach ($data1 as $allParticulariterAction) {
            foreach ($data2 as $particulariteActionUser) {
                if ($allParticulariterAction['id'] == $particulariteActionUser['id_particularite_action']) {
                    $commun_element[] = ([
                        "id" => $allParticulariterAction['id'],
                        "nom" => $allParticulariterAction['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);

        $data['cs_particularite_actions'] = $liste;
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_particulariter_actions', $data);
    }
    public function structureModifierInformationsModalites()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $c_utilisateur_modalite = new c_utilisateur_modalite();
        $cs_modalite = new cs_modalite();
        $data1 = $cs_modalite->where('etat =', 1)->find();
        $data2 = $c_utilisateur_modalite->where('c_utilisateur_modalite.id_utilisateur', intval($user["id"]))->find();
        $query = $db->query("SELECT * FROM cs_modalite WHERE cs_modalite.id  not IN (SELECT c_utilisateur_modalite.id_modalite from c_utilisateur_modalite where c_utilisateur_modalite.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();
        $commun_element = [];
        $diff_element = [];
        foreach ($data1 as $allModaliters) {
            foreach ($data2 as $modaliterUser) {
                if ($allModaliters['id'] == $modaliterUser['id_modalite']) {
                    $commun_element[] = ([
                        "id" => $allModaliters['id'],
                        "nom" => $allModaliters['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);
        $data['cs_modalites'] = $liste;
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_modalites', $data);
    }
    public function structureModifierInformationsTerritoires()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $db = \Config\Database::connect();
        $user = $this->session->get('user');
        $cs_territoire = new cs_territoire();
        $c_utilisateur_territoire = new c_utilisateur_territoire();
        $data1 = $cs_territoire->find();
        $data2 = $c_utilisateur_territoire->where('c_utilisateur_territoire.id_utilisateur', intval($user["id"]))->find();
        $query = $db->query("SELECT * FROM cs_territoire WHERE cs_territoire.id  not IN (SELECT c_utilisateur_territoire.id_territoire from c_utilisateur_territoire where c_utilisateur_territoire.id_utilisateur = '" . intval($user["id"]) . "')");
        $results = $query->getResultArray();
        $commun_element = [];
        $diff_element = [];
        foreach ($data1 as $allTerritoires) {
            foreach ($data2 as $territoiresUser) {
                if ($allTerritoires['id'] == $territoiresUser['id_territoire']) {
                    $commun_element[] = ([
                        "id" => $allTerritoires['id'],
                        "nom" => $allTerritoires['nom'],
                        "active" => 1
                    ]
                    );
                }
            }
        }

        foreach ($results as $result) {
            $diff_element[] = ([
                "id" => $result['id'],
                "nom" => $result['nom'],
                "active" => 0
            ]
            );
        }
        $liste = array_merge($commun_element, $diff_element);
        sort($liste);
        $data['cs_territoires'] = $liste;
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_territoires', $data);
    }
    public function structureModifierInformationsDescription()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }
        $struct = new cs_struct();
        //$c_utilisateur = new c_utilisateur();
        $user = $this->session->get('user');
        // var_dump($user);
        $categorieUser = intval($user["id_utilisateur_categorie"]);
        if ($categorieUser == 2) {
            $user_data['structs'] = $struct->join('cs_categorie', 'cs_categorie.id = cs_struct.id_categorie')->where('cs_struct.id_utilisateur', intval($user["id"]))->first();
            echo view('static/structure/header');
            echo view('structure/modifier/ma_structure_modifier_informations_description', $user_data);
            echo view('static/footer');
        }
    }
    public function structureModifierDocument()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $user = $this->session->get('user');
        $c_utilisateur_files = new c_utilisateur_files();
        $user_data['files'] = $c_utilisateur_files->select('*')->where('c_utilisateur_files.id_utilisateur', intval($user["id"]))->where('c_utilisateur_files.etat', 1)->orderBy('c_utilisateur_files.date_ins', 'desc')->limit(3)->find();
        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_document', $user_data);
        echo view('static/footer');
    }

    public function structureModifierHeureOuverture()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $cs_jour_horaire = new cs_jour_horaire();
        $user = $this->session->get('user');

        $data['semaines'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '1')->first();
        $data['weekends'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '2')->first();
        $data['vacances'] = $cs_jour_horaire->where('cs_jour_horaire.id_utilisateur', intval($user["id"]))->where('cs_jour_horaire.id_rang', '3')->first();

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_heure_ouverture', $data);
        echo view('static/footer');
    }

    public function structureModifierReferent()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if($user_isloginEd == false){
            return redirect()->to('/connexion');
        }

        $cs_referent = new cs_referent();
        $user = $this->session->get('user');
        $data['referent'] = $cs_referent->where('id_utilisateur', intval($user["id"]))->first();

        echo view('static/structure/header');
        echo view('structure/modifier/ma_structure_modifier_informations_referent', $data);
        echo view('static/footer');
    }

    
   //Ma structure


    //Desactiver Profil Structure
    public function structureDesactivationProfil()
    {
        echo view('static/landingPage/header');
        echo view('structure/desactiver_profil_structure');
        echo view('static/landingPage/footer');
    }
    //Desactiver Profil Structure

    //Deconnexion structure
    public function structureDeconnexion()
    {
        echo view('static/landingPage/header');
        echo view('structure/deconnexion_structure');
        echo view('static/landingPage/footer');
    }

    //Signaler problème
    public function structureSignaleProbleme()
    {
        echo view('static/header');
        echo view('structure/signaler_problemes');
        echo view('static/landingPage/footer');
    }

}