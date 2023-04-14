<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\regionsMaroc::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $regions = [
            'Tanger-Tétouan-Al Hoceïma',
            'Oriental',
            'Fès-Meknès',
            'Rabat-Salé-Kénitra',
            'Béni Mellal-Khénifra',
            'Casablanca-Settat',
            'Marrakech-Safi',
            'Drâa-Tafilalet',
            'Souss-Massa',
            'Guelmim-Oued Noun',
            'Laâyoune-Sakia El Hamra',
            'Dakhla-Oued Ed-Dahab',
        ];

        foreach ($regions as $region) {
            \App\Models\regions::factory()->create([
                'name' => $region,
            ]);
        }
        \App\Models\bibliotheque::factory()->create([
            'title'=>'le guide marocain des associations',
            'description'=>'Les associations sont essentielles pour résoudre les problèmes du Maroc et le Guide Marocain des Associations est une ressource précieuse pour les personnes impliquées dans ce travail.',
            'image'=>'guide.jpg',
            'link'=>'http://www.acodec.org/medias/files/guide-marocain-des-associations.pdf',
        ]);
    }
}
