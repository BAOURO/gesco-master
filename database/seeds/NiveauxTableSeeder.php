<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //parcours IAA
        Niveau::create([
            'nom' => 'Niveau 1',
            'abreviation' => 'IAA 1',
            'parcour_id' => '1'
        ]);
        Niveau::create([
            'nom' => 'Niveau 2',
            'abreviation' => 'IAA 2',
            'parcour_id' => '1'
        ]);
        Niveau::create([
            'nom' => 'Niveau 3',
            'abreviation' => 'IAA 3',
            'parcour_id' => '1'
        ]);

        //Parcours MIP
        Niveau::create([
            'nom' => 'Niveau 1',
            'abreviation' => 'MIP 1',
            'parcour_id' => '2'
        ]);
        Niveau::create([
            'nom' => 'Niveau 2',
            'abreviation' => 'MIP 2',
            'parcour_id' => '2'
        ]);
        Niveau::create([
            'nom' => 'Niveau 3',
            'abreviation' => 'MIP 3',
            'parcour_id' => '2'
        ]);
        
        //Parcours CICE
        Niveau::create([
            'nom' => 'Niveau 1',
            'abreviation' => 'CIGE 1',
            'parcour_id' => '3'
        ]);
        Niveau::create([
            'nom' => 'Niveau 2',
            'abreviation' => 'CIGE 2',
            'parcour_id' => '3'
        ]);
        Niveau::create([
            'nom' => 'Niveau 3',
            'abreviation' => 'CIGE 3',
            'parcour_id' => '3'
        ]);

        //MAIN-GEFT
        Niveau::create([
            'nom' => 'Master Pro 1',
            'abreviation' => 'MAIN-GEFT 1',
            'parcour_id' => '4'
        ]);
        Niveau::create([
            'nom' => 'Master Pro 2',
            'abreviation' => 'MAIN-GEFT 2',
            'parcour_id' => '4'
        ]);

        //CGQ
        Niveau::create([
            'nom' => 'Master Pro 1',
            'abreviation' => 'CGQ 1',
            'parcour_id' => '5'
        ]);
        Niveau::create([
            'nom' => 'Master Pro 2',
            'abreviation' => 'CGQ 2',
            'parcour_id' => '5'
        ]);

        //NA
        Niveau::create([
            'nom' => 'Master Pro 1',
            'abreviation' => 'NA 1',
            'parcour_id' => '6'
        ]);
        Niveau::create([
            'nom' => 'Master Pro 2',
            'abreviation' => 'NA 2',
            'parcour_id' => '6'
        ]);
    }
}
