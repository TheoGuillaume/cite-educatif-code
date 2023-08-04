<?php
namespace App\Models;
use CodeIgniter\Model;
class cs_struct extends Model
{
    // Table
    protected $table = 'cs_struct';
    // allowed fields to manage
    protected $allowedFields = [
        'id',
        'id_utilisateur',
        'id_categorie',
        'nom_social',
        'sigle',
        'siren',
        'adresse_siege',
        'adresse_principale',
        'email_siege',
        'tel_siege',
        'site_web',
        'desc_horaire_ouverture',
        'desc_mission',
        'photo_logo',
        'date_ins',
        'etat',
    ];
    // Validation rules for id
    protected $validationRules = [
        'id' => 'integer',
    ];
}
