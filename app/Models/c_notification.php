<?php
namespace App\Models;
use CodeIgniter\Model;
class c_notification extends Model
{
    // Table
    protected $table = 'c_notification';
    // allowed fields to manage
    protected $allowedFields = [
        'id_envoyeur',
        'id_recepteur',
        'lu',
        'date_ins',
        'etat',
    ];
}