<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PassageUtilisateurSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 3,
                'createAt' => date('Y-m-d'),
            ],
            [
                'id_user' => 2,
                'createAt' => date('Y-m-d'),
            ],
            // Ajoutez d'autres enregistrements de test ici
        ];

        $this->db->table('passage_utilisateur')->insertBatch($data);
    }
}
