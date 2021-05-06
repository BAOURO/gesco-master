<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Seeder;

class CyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cycle::create([
            'nom' => 'Ingenieurs de Conception',
            'abreviation' => 'ING'
        ]);
        Cycle::create([
            'nom' => 'Master Professionnelle',
            'abreviation' => 'Master Pro'
        ]);
        Cycle::create([
            'nom' => 'Master Recherche',
            'abreviation' => 'Master Recherche'
        ]);
        Cycle::create([
            'nom' => 'Doctorat',
            'abreviation' => 'PhD'
        ]);
    }
}
