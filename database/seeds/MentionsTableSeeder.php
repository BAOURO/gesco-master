<?php

namespace Database\Seeders;

use App\Models\Mention;
use Illuminate\Database\Seeder;

class MentionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cycle Ingenieur
        Mention::create([
            'nom' => 'Industries Agricoles et Alimentaires',
            'abreviation' => 'IAA',
            'cycle_id' => '1'
        ]);
        Mention::create([
            'nom' => 'Maintenance Industrielle et Productique',
            'abreviation' => 'MIP',
            'cycle_id' => '1'
        ]);
        Mention::create([
            'nom' => 'Chimie Industrielle et Genie de l\'Environnement',
            'abreviation' => 'CIGE',
            'cycle_id' => '1'
        ]);

        //Cycle Master Pro
        Mention::create([
            'nom' => 'Maintenance et Gestion des Systèmes Frigorifique et Thermique',
            'abreviation' => 'MAIN-GEFT',
            'cycle_id' => '2'
        ]);
        Mention::create([
            'nom' => 'Controle et Gestion de la Qualite',
            'abreviation' => 'CGQ',
            'cycle_id' => '2'
        ]);
        Mention::create([
            'nom' => 'Nutrition Appliquée',
            'abreviation' => 'NA',
            'cycle_id' => '2'
        ]);

        //Master Recherche
        Mention::create([
            'nom' => 'Ingerierie des Equipements Agro-Industrielle',
            'abreviation' => 'IEAI',
            'cycle_id' => '3'
        ]);
        Mention::create([
            'nom' => 'Energetique de Procede',
            'abreviation' => 'EP',
            'cycle_id' => '3'
        ]);
        Mention::create([
            'nom' => 'Chimie Industrielle et Environnementale',
            'abreviation' => 'CIE',
            'cycle_id' => '3'
        ]);
        Mention::create([
            'nom' => 'Génie de Procedes',
            'abreviation' => 'GP',
            'cycle_id' => '3'
        ]);
        Mention::create([
            'nom' => 'Science Alimentaire et Nutritionnelle',
            'abreviation' => 'SAN',
            'cycle_id' => '3'
        ]);

        //Cyle PhD
        Mention::create([
            'nom' => 'Physique Appliquée a l\'Ingenierie',
            'abreviation' => 'PAI',
            'cycle_id' => '4'
        ]);
        Mention::create([
            'nom' => 'Energetique de Procèdes',
            'abreviation' => 'EP',
            'cycle_id' => '4'
        ]);
        Mention::create([
            'nom' => 'Chimie Industrielle et Environnementale',
            'abreviation' => 'CIE',
            'cycle_id' => '4'
        ]);
        Mention::create([
            'nom' => 'Genie de Procedes',
            'abreviation' => 'GP',
            'cycle_id' => '4'
        ]);
        Mention::create([
            'nom' => 'Science Alimentaire et Nutritionnelle',
            'abreviation' => 'SAN',
            'cycle_id' => '4'
        ]);
    }
}
