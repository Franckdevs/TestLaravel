<?php

namespace Database\Seeders;

use App\Models\famille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $familles = [
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            ['type' => 'soeur', 'nom' => 'leticia', 'numero' => '12345', 'cars_id' => 1],
            ['type' => 'frere', 'nom' => 'sarah', 'numero' => '67890', 'cars_id' => 2],
            
            // Ajoutez d'autres données selon vos besoins
        ];

        // Utilisez la boucle pour insérer les données dans la table
        foreach ($familles as $famille) {
            famille::create($famille);
        }
    }
}
