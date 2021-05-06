<?php

namespace Database\Seeders;

use App\Models\Pays;
use Illuminate\Database\Seeder;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pays::create([
            'nom' => 'Cameroun',
            'code' => 'CMR'
         ]);
        Pays::create([
            'nom' => 'Tchad'
         ]);
        Pays::create([
            'nom' => 'Congo'
         ]);
        Pays::create([
            'nom' => 'Gabon'
         ]);
        Pays::create([
            'nom' => 'Guinée équatoriale',
            'code' => 'GE'
         ]);
        Pays::create([
            'nom' => 'Réqublique Centrafricaine',
            'code' => 'RCA'
         ]);
        Pays::create([
            'nom' => 'Réqublique démocratique du Congo',
            'code' => 'RDC'
         ]);
    }
}
