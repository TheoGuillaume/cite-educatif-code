<?php

namespace App\Controllers;

use App\Models\c_utilisateur;
use App\Models\c_notification;
use App\Models\ca_acteur;
use App\Models\cs_struct;
use App\Models\c_acteur_struct;

class Notification extends BaseController
{

    // public function fecthNotification($id_recepteur)
    // {
    //     $db = \Config\Database::connect();
    //     $sql = "SELECT * FROM v_demande_confimer_struct where v_demande_confimer_struct.id_recepteur = '" . $id_recepteur . "'";
    //     $query = $db->query($sql);
    //     $results = $query->getResultArray();
    //     $data['demande_confimer'] = $results;
    //     return $this->response->setJSON($data);
    // }

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

    public function notification()
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $user = $this->session->get('user');
        $c_notification = new c_notification();
        $categorieUser = intval($user["id_utilisateur_categorie"]);

        $data["notif"] = $this->fecthNbNotification(intval($user["id"]), $categorieUser);
        $model_actu = new \App\Models\ActualiteModel;
        $data['actus'] = $model_actu->findByActif();

        if ($categorieUser == 2) {

            $data['notifications'] = $c_notification->select('ca_acteur.id, ca_acteur.nom, ca_acteur.prenom, ca_acteur.poste, ca_acteur.photo_profil, c_notification.id_envoyeur, c_notification.id_recepteur, c_notification.lu, c_acteur_struct.id as id_demande,c_notification.id as id_notification, c_acteur_struct.etat as isConfirme')
                ->join('ca_acteur', 'c_notification.id_envoyeur = ca_acteur.id_utilisateur')
                ->join('c_acteur_struct', 'ca_acteur.id = c_acteur_struct.id_acteur')
                ->where('c_notification.lu', 0)
                ->where('c_notification.id_recepteur', intval($user["id"]))
                ->orderBy('c_notification.date_ins', 'DESC')
                ->findAll();

            echo view('static/landingPage/header', $data);
            echo view('notification/notification', $data);
            echo view('static/landingPage/footer');
        }

        if ($categorieUser == 3) {
            $db = \Config\Database::connect();
            $sql = "SELECT * FROM v_demande_confimer_struct where v_demande_confimer_struct.id_recepteur = '" . intval($user["id"]) . "' and v_demande_confimer_struct.lu = 0";
            $query = $db->query($sql);
            $results = $query->getResultArray();
            $data['notifications'] = $results;
            echo view('static/landingPage/header', $data);
            echo view('notification/notification_acteur', $data);
            echo view('static/landingPage/footer');
        }
    }

    public function demandeConfirmer($id_demande, $id_notification)
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $user = $this->session->get('user');
        $c_acteur_struct = new c_acteur_struct();
        $c_notification = new c_notification();

        if (!empty($id_demande) && !empty($id_notification)) {
            $acteur_structure = $c_acteur_struct->where('id', $id_demande)->first();
            $acteur_structure['etat'] = 2;
            if ($c_acteur_struct->update($acteur_structure['id'], $acteur_structure)) {
                //get notification by id notification
                $notification = $c_notification->where('id', $id_notification)->first();
                $notification['lu'] = 1;
                if ($c_notification->update($notification['id'], $notification)) {
                    $data_notification = [
                        'id_envoyeur' => intval($user["id"]),
                        'id_recepteur' => $notification['id_envoyeur']
                    ];
                    $c_notification->insert($data_notification);
                    return $this->response->redirect(site_url('/notification'));
                }
            }
        }
    }

    public function demandeRefuser($id_demande, $id_notification)
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $user = $this->session->get('user');
        $c_acteur_struct = new c_acteur_struct();
        $c_notification = new c_notification();

        if (!empty($id_demande) && !empty($id_notification)) {
            $acteur_structure = $c_acteur_struct->where('id', $id_demande)->first();
            $acteur_structure['etat'] = 1;
            if ($c_acteur_struct->update($acteur_structure['id'], $acteur_structure)) {

                //get notification by id notification
                $notification = $c_notification->where('id', $id_notification)->first();
                $notification['lu'] = 1;
                if ($c_notification->update($notification['id'], $notification)) {
                    // $data_notification = [
                    //     'id_envoyeur' => intval($user["id"]),
                    //     'id_recepteur' => $notification['id_envoyeur']
                    // ];
                    // $c_notification->insert($data_notification);
                    return $this->response->redirect(site_url('/notification'));
                }
            }
        }
    }

    public function demandeRecu($id_notification)
    {
        $user_isloginEd = $this->session->get('isLogined');
        if ($user_isloginEd == false) {
            return redirect()->to('/connexion');
        }

        $c_notification = new c_notification();
        if (!empty($c_notification)) {
            $notification = $c_notification->where('id', $id_notification)->first();
            $notification['lu'] = 1;
            $c_notification->update($notification['id'], $notification);
            return $this->response->redirect(site_url('/notification'));
        }
    }
}
