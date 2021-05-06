<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Departement de la region de l'extreme-Nord
       Departement::create([
        'nom' => 'Diamaré',
        'chef_lieu' => 'Maroua',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Logone-et-Chari',
        'chef_lieu' => 'Kousséri',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Mayo-Danay',
        'chef_lieu' => 'Yagoua',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Mayo-Kani',
        'chef_lieu' => 'Kaélé',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Mayo-Sava',
        'chef_lieu' => 'Mora',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Mayo-Sava',
        'chef_lieu' => 'Mora',
        'region_id' => '1',
    ]);
    Departement::create([
        'nom' => 'Mayo-Tsanaga',
        'chef_lieu' => 'Mokolo',
        'region_id' => '1',
    ]);

    //Departement de la region du Nord
    Departement::create([
        'nom' => 'Bénoué',
        'chef_lieu' => 'Garoua',
        'region_id' => '2',
    ]);
    Departement::create([
        'nom' => 'Faro',
        'chef_lieu' => 'Poli',
        'region_id' => '2',
    ]);
    Departement::create([
        'nom' => 'Mayo-Louti',
        'chef_lieu' => 'Guider',
        'region_id' => '2',
    ]);
    Departement::create([
        'nom' => 'Mayo-Rey',
        'chef_lieu' => 'Tcholliré',
        'region_id' => '2',
    ]);


    //Departement de la region de l'Adamaoua
    Departement::create([
     'nom' => 'Djérem',
     'chef_lieu' => 'Tibati',
     'region_id' => '3',
     ]);
    Departement::create([
     'nom' => 'Faro-et-Déo',
     'chef_lieu' => 'Tignère',
     'region_id' => '3',
     ]);
    Departement::create([
     'nom' => 'Mayo-Banyo',
     'chef_lieu' => 'Banyo',
     'region_id' => '3',
     ]);
    Departement::create([
     'nom' => 'Mbéré',
     'chef_lieu' => 'Meiganga',
     'region_id' => '3',
     ]);
    Departement::create([
     'nom' => 'Vina',
     'chef_lieu' => 'Ngaoundéré',
     'region_id' => '3',
     ]);

     //Departement de la region de l'EST
     Departement::create([
         'nom' => 'Boumba-et-Ngoko',
         'chef_lieu' => 'Yokadouma',
         'region_id' => '4',
     ]);
     Departement::create([
         'nom' => 'Haut-Nyong',
         'chef_lieu' => 'Abong-Mbang',
         'region_id' => '4',
     ]);
     Departement::create([
         'nom' => 'Kadey',
         'chef_lieu' => 'Batouri',
         'region_id' => '4',
     ]);
     Departement::create([
         'nom' => 'Lom-et-Djérem',
         'chef_lieu' => 'Bertoua',
         'region_id' => '4',
     ]);


     //Departement de la region du Centre
     Departement::create([
         'nom' => 'Haute-Sanaga',
         'chef_lieu' => 'Nanga-Eboko',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Lekié',
         'chef_lieu' => 'Monatele',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Mbam-et-Inoubou',
         'chef_lieu' => 'Bafia',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Mbam-et-Kim',
         'chef_lieu' => 'Ntui',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Méfou-et-Afamba',
         'chef_lieu' => 'Mfou',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Méfou-et-Akono',
         'chef_lieu' => 'Ngoumou',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Mfoundi',
         'chef_lieu' => 'Yaoundé',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Nyong-et-Kellé',
         'chef_lieu' => 'Éséka',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Nyong-et-Mfoumou',
         'chef_lieu' => 'Akonolinga',
         'region_id' => '5',
     ]);
     Departement::create([
         'nom' => 'Nyong-et-So’o',
         'chef_lieu' => 'Mbalmayo',
         'region_id' => '5',
     ]);

     //Departement de la region du Sud
     Departement::create([
         'nom' => 'Dja-et-Lobo',
         'chef_lieu' => 'Sangmélima',
         'region_id' => '6',
     ]);
     Departement::create([
         'nom' => 'Mvila',
         'chef_lieu' => 'Ebolowa',
         'region_id' => '6',
     ]);
     Departement::create([
         'nom' => 'Océan',
         'chef_lieu' => 'Kribi',
         'region_id' => '6',
     ]);
     Departement::create([
         'nom' => 'Vallée-du-Ntem',
         'chef_lieu' => 'Ambam',
         'region_id' => '6',
     ]);

     //Departement de la region du Littoral
     Departement::create([
         'nom' => 'Moungo',
         'chef_lieu' => 'Nkongsamba',
         'region_id' => '7',
     ]);
     Departement::create([
         'nom' => 'Nkam',
         'chef_lieu' => 'Yabassi',
         'region_id' => '7',
     ]);
     Departement::create([
         'nom' => 'Sanaga-Maritime',
         'chef_lieu' => 'Édéa',
         'region_id' => '7',
     ]);
     Departement::create([
         'nom' => 'Wouri',
         'chef_lieu' => 'Douala',
         'region_id' => '7',
     ]);

     //Departement de la region de l'OUSET
     Departement::create([
         'nom' => 'Bamboutos',
         'chef_lieu' => 'Mbouda',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Haut-Nkam',
         'chef_lieu' => 'Bafang',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Hauts-Plateaux',
         'chef_lieu' => 'Baham',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Koung-Khi',
         'chef_lieu' => 'Bandjoun',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Menoua',
         'chef_lieu' => 'Dschang',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Mifi',
         'chef_lieu' => 'Bafoussam',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Ndé',
         'chef_lieu' => 'Bangangté',
         'region_id' => '8',
     ]);
     Departement::create([
         'nom' => 'Noun',
         'chef_lieu' => 'Foumban',
         'region_id' => '8',
     ]);

     //Departement de la region du Nord-Ouest
     Departement::create([
         'nom' => 'Boyo',
         'chef_lieu' => 'Fundong',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Bui',
         'chef_lieu' => 'Kumbo',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Donga-Mantung',
         'chef_lieu' => 'Nkambé',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Menchum',
         'chef_lieu' => 'Wum',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Mezam',
         'chef_lieu' => 'Bamenda',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Momo',
         'chef_lieu' => 'Mbengwi',
         'region_id' => '9',
     ]);
     Departement::create([
         'nom' => 'Ngo-Ketunjia',
         'chef_lieu' => 'Ndop',
         'region_id' => '9',
     ]);

     //Departement de la region du SUD-OUEST
     Departement::create([
         'nom' => 'Fako',
         'chef_lieu' => 'Limbé',
         'region_id' => '10',
     ]);
     Departement::create([
         'nom' => 'Koupé-Manengouba',
         'chef_lieu' => 'Bangem',
         'region_id' => '10',
     ]);
     Departement::create([
         'nom' => 'Lebialem',
         'chef_lieu' => 'Menji',
         'region_id' => '10',
     ]);
     Departement::create([
         'nom' => 'Manyu',
         'chef_lieu' => 'Mamfé',
         'region_id' => '10',
     ]);
     Departement::create([
         'nom' => 'Meme',
         'chef_lieu' => 'Kumba',
         'region_id' => '10',
     ]);
     Departement::create([
         'nom' => 'Ndian',
         'chef_lieu' => 'Mundemba',
         'region_id' => '10',
     ]);
    }
}
