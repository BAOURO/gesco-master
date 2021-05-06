<?php

namespace Database\Seeders;

use App\Models\Parcours;
use Illuminate\Database\Seeder;

class ParcoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parcours::create([
            'nom' => 'Industries Agricoles et Alimentaires',
            'abreviation' => 'IAA',
            'mention_id' => '1'
        ]);
        Parcours::create([
            'nom' => 'Maintenance Industrielle et Productiaue',
            'abreviation' => 'MIP',
            'mention_id' => '2'
        ]);
        Parcours::create([
            'nom' => 'Chimie Industrielle et Génie de l\'Environnement',
            'abreviation' => 'CIGE',
            'mention_id' => '3'
        ]);
        Parcours::create([
            'nom' => 'Maintenance et Gestion des Systèmes Frigorifique et Thermique',
            'abreviation' => 'MAIN-GEFT',
            'mention_id' => '4'
        ]);
        Parcours::create([
            'nom' => 'Controle et Gestion de la Qualité',
            'abreviation' => 'CGQ',
            'mention_id' => '5'
        ]);
        Parcours::create([
            'nom' => 'Nutrition Appliquée',
            'abreviation' => 'NA',
            'mention_id' => '6'
        ]);
    }
}
