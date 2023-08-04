<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id_utilisateur_categorie' => 1,
                'nom' => 'Direction Education Enfance',
                'email' => 'direction.education.enfance@ville-argenteuil.fr',
                'mdp_1' => password_hash('admin', PASSWORD_DEFAULT),
                'etat' => 1
            ],
            [
                'id_utilisateur_categorie' => 1,
                'nom' => 'Cité Educative',
                'email' => 'cite.educative@ville-argenteuil.fr',
                'mdp_1' => password_hash('admin', PASSWORD_DEFAULT),
                'etat' => 1
            ],
            // Ajoutez d'autres utilisateurs ici
        ];
        $this->db->table('c_utilisateur')->insertBatch($users);
    }
}
