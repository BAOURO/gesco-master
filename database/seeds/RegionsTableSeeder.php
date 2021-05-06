<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Region du Cameroun
        Region::create([
            'nom' => 'Extrême-Nord',
            'chef_lieu' => 'Maroua',
            'code' => 'EN',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Nord',
            'chef_lieu' => 'Garoua',
            'code' => 'NO',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Adamaoua',
            'chef_lieu' => 'Ngaoundéré',
            'code' => 'AD',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Est',
            'chef_lieu' => 'Bertoua',
            'code' => 'ES',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Centre',
            'chef_lieu' => 'Yaoundé',
            'code' => 'CE',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Sud',
            'chef_lieu' => 'Ebolowa',
            'code' => 'SU',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Littoral',
            'chef_lieu' => 'Douala',
            'code' => 'LT',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Ouest',
            'chef_lieu' => 'Bafoussam',
            'code' => 'OU',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Nord-Ouest',
            'chef_lieu' => 'Bamenda',
            'code' => 'NW',
            'pays_id' => '1'
        ]);
        Region::create([
            'nom' => 'Sud-Ouest',
            'chef_lieu' => 'Buea',
            'code' => 'SW',
            'pays_id' => '1'
        ]);

        //Region du Tchad
        Region::create([
            'nom' => 'Centre',
            'chef_lieu' => 'Mongo',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Centre-Est',
            'chef_lieu' => 'Am-Timan',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Centre-Ouest',
            'chef_lieu' => 'Massenya',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Est',
            'chef_lieu' => 'Abéché',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Extrême-Nord',
            'chef_lieu' => 'Bardai',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Sud-Est',
            'chef_lieu' => 'Sarh',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Nord',
            'chef_lieu' => 'Faya-Largeau',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Nord-Est',
            'chef_lieu' => 'Amdjarass',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Ouest',
            'chef_lieu' => 'Bol',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Sud',
            'chef_lieu' => 'Moundou',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'Sud-Ouest',
            'chef_lieu' => 'Pala',
            'pays_id' => '2'
        ]);
        Region::create([
            'nom' => 'N’Djamena',
            'chef_lieu' => 'N’Djamena',
            'pays_id' => '2'
        ]);
    }
}
