<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubMenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMenuItem::create([
            'name' => 'Annees',
            'link' => 'annees.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Cycles',
            'link' => 'cycles.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Mentions',
            'link' => 'mentions.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Parcours',
            'link' => 'parcours.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Niveaux',
            'link' => 'niveaux.index',
            'status' => '',
            'menu_item_id' => '',
        ]);
        SubMenuItem::create([
            'name' => 'Pays',
            'link' => 'pays.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Regions',
            'link' => 'regions.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
        SubMenuItem::create([
            'name' => 'Departements',
            'link' => 'departements.index',
            'status' => 'enable',
            'menu_item_id' => '1',
        ]);
    }
}
